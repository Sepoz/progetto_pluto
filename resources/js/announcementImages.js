// aspetta che il DOM finisca di caricarsi
document.addEventListener("DOMContentLoaded", ready);

function ready() {
    const drophere = document.querySelector("#drophere");

    if (drophere) {
        const csrfToken = document.querySelector("input[name='_token']").value;
        const uniqueSecret = document.querySelector(
            "input[name='uniqueSecret']"
        ).value;

        let myDropzone = new Dropzone(drophere, {
            url: "announcement/images/upload",
            maxFilesize: 2, // MB
            params: {
                _token: csrfToken,
                uniqueSecret: uniqueSecret,
            },
            addRemoveLinks: true,

            init: async function () {
                const response = await fetch(
                    `/announcement/images/${uniqueSecret}`,
                    {
                        method: "GET",
                        headers: {
                            "Content-Type": "application/json",
                        },
                    }
                );

                const data = await response.json();

                data.forEach((image) => {
                    let file = {
                        serverId: image.id,
                    };

                    myDropzone.options.addedfile.call(myDropzone, file);
                    myDropzone.options.thumbnail.call(
                        myDropzone,
                        file,
                        image.src
                    );
                });
            },
        });

        myDropzone.on("success", (file, response) => {
            file.serverId = response.id;
        });

        myDropzone.on("removedfile", async (file) => {
            const response = await fetch("/announcement/images/remove", {
                method: "DELETE",
                headers: {
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({
                    _token: csrfToken,
                    id: file.serverId,
                    uniqueSecret: uniqueSecret,
                }),
            });
        });
    }
}
