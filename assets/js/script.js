console.log("CreateMyResume System Loaded");

const searchInput = document.getElementById("jobSearch");

if (searchInput) {

    searchInput.addEventListener("keyup", function () {

        let searchValue = searchInput.value.toLowerCase();

        let jobCards = document.querySelectorAll(".job-card");

        jobCards.forEach(function(card) {

            let text = card.innerText.toLowerCase();

            if (text.includes(searchValue)) {

                card.style.display = "block";

            } else {

                card.style.display = "none";

            }

        });

    });

}