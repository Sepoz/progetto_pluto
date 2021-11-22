// TEST ---- forse non serve

fetch("./annunci.json")
    .then((data) => data.json())
    .then((ads) => {
        const adsWrapper = document.querySelector("#adsWrapper");
        const inputSearch = document.querySelector("#inputSearch");
        const selectCategoryFilter = document.querySelector(
            "#selectCategoryFilter"
        );

        let maxPriceLabel = document.querySelector("#maxPriceLabel");
        let minPriceLabel = document.querySelector("#minPriceLabel");
        let inputMaxPrice = document.querySelector("#inputMaxPrice");
        let inputMinPrice = document.querySelector("#inputMinPrice");

        function formatText(string) {
            console.log();
            if (string.length > 10) {
                return string.split(" ")[0] + "...";
            } else {
                return string;
            }
        }

        function populateAds(ads) {
            adsWrapper.innerHTML = "";
            ads.forEach((ad) => {
                let card = document.createElement("div");

                card.classList.add("col-12", "col-sm-6", "col-xl-4");

                card.innerHTML = `
            <div class="ad-card">
                <img class="img-fluid" src="https://picsum.photos/600/300" alt="">
                <div class="ad-details mx-auto">
                    <p class="lead fw-bold tc-gray">${ad.price}$</p>
                    <div class="ad-title">
                    <span class="up-tooltip">${ad.name}</span>
                    <h4 class="fs-5 fw-bold">${formatText(ad.name)}</h4>
                    </div>
                    <p class="tc-gray">${ad.category}</p>
                    <a class="btn ad-card-link text-white">
                        <i class="fa-solid fa-eye"></i>
                    </a>
                </div>
            </div>
            
            `;
                adsWrapper.appendChild(card);
            });
        }

        function showMessage(message) {
            adsWrapper.innerHTML = "";

            let div = document.createElement("div");
            div.classList.add("col-12");

            div.innerHTML = `<h2 class="display-4">${message}</h2>`;

            adsWrapper.appendChild(div);
        }

        function search(str, ads) {
            let filtered = ads.filter((ad) =>
                ad.name.toLowerCase().includes(str.toLowerCase())
            );

            return filtered;
        }

        function populateCategoryFilter() {
            let categories = new Set(ads.map((ad) => ad.category));

            categories.forEach((category) => {
                let option = document.createElement("option");

                option.value = category;
                option.innerHTML = category;

                selectCategoryFilter.appendChild(option);
            });
        }

        function filterByCategory(category, ads) {
            if (category === "all") {
                return ads;
            } else {
                let filtered = ads.filter((ad) => ad.category === category);

                return filtered;
            }
        }

        function populatePriceFilter() {
            let prices = ads.map((ad) => ad.price);
            let min = Math.floor(Math.min(...prices));
            let max = Math.ceil(Math.max(...prices));

            // imposto gli attributi degli input al massimo e minimo degli annunci che ho caricato
            inputMaxPrice.max = max;
            inputMaxPrice.min = min;
            inputMaxPrice.value = max;

            inputMinPrice.max = max;
            inputMinPrice.min = min;
            inputMinPrice.value = min;

            // imposto le etichette
            maxPriceLabel.innerHTML = max + " $";
            minPriceLabel.innerHTML = min + " $";
        }

        function changeMinPrice() {
            let selectedMax = Number(inputMaxPrice.value);
            let selectedMin = Number(inputMinPrice.value);

            if (selectedMin >= selectedMax) {
                inputMinPrice.value = selectedMax;
            } else {
                minPriceLabel.innerHTML = selectedMin + " $";
            }
            // filterByPrice()
        }

        function changeMaxPrice() {
            let selectedMax = Number(inputMaxPrice.value);
            let selectedMin = Number(inputMinPrice.value);

            if (selectedMax <= selectedMin) {
                inputMaxPrice.value = selectedMin;
            } else {
                maxPriceLabel.innerHTML = inputMaxPrice.value + " $";
            }
            // filterByPrice()
        }

        // function changePrice(){
        //     let selectedMax = Number(inputMaxPrice.value)
        //     let selectedMin = Number(inputMinPrice.value)

        //     if(selectedMax <=  selectedMin) {
        //         inputMaxPrice.value = selectedMin + 100
        //         inputMinPrice.value = selectedMax - 100
        //     }

        //     maxPriceLabel.innerHTML = selectedMax + ' $'
        //     minPriceLabel.innerHTML = selectedMin + ' $'
        // }

        function filterByPrice(ads) {
            let selectedMax = Number(inputMaxPrice.value);
            let selectedMin = Number(inputMinPrice.value);

            let filtered = ads.filter(
                (ad) => ad.price >= selectedMin && ad.price <= selectedMax
            );

            return filtered;
        }

        function globalFilter() {
            // let selectedMax = Number(inputMaxPrice.value)
            // let selectedMin = Number(inputMinPrice.value)
            let selectedCategory = selectCategoryFilter.value;
            let searched = inputSearch.value;

            let globalFiltered = search(
                searched,
                filterByCategory(selectedCategory, filterByPrice(ads))
            );

            if (globalFiltered.length > 0) {
                populateAds(globalFiltered);
            } else {
                showMessage("Nessun annuncio trovato");
            }
        }

        populatePriceFilter();
        populateAds(ads);
        populateCategoryFilter();

        inputSearch.addEventListener("input", () => {
            globalFilter();
        });

        selectCategoryFilter.addEventListener("input", () => {
            globalFilter();
        });

        inputMinPrice.addEventListener("input", () => {
            changeMinPrice();
            globalFilter();
        });

        inputMaxPrice.addEventListener("input", () => {
            changeMaxPrice();
            globalFilter();
        });
    });
