const tabBtn = document.querySelectorAll(".p3map_heading_right ul li.act");
const tabCnt = document.querySelectorAll(".p3map_one");

const p7tabBtn = document.querySelectorAll(".p7main_right_tab ul li");
const p7tabCnt = document.querySelectorAll(".p7tabcnts");

function customTab(tabitem, tabcontent) {
    tabitem.forEach((titem) => {
        titem.addEventListener("click", () => {
            const target = titem.getAttribute("target");

            tabcontent.forEach((items) => {
                const tigger = items.getAttribute("id");

                if (target === tigger) {
                    items.style.display = "block";
                } else {
                    items.style.display = "none";
                }
            });

            tabitem.forEach((item) => {
                item.classList.remove("active");
            });

            titem.classList.add("active");
        });
    });
}

customTab(tabBtn, tabCnt);

//customTab(p7tabBtn, p7tabCnt);