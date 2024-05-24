var perPage = 8,
    options = {
        valueNames: ["no", "kode_pelanggan", "nama", "tahun", "bulan", "total"],
        page: perPage,
        pagination: !0,
        plugins: [ListPagination({ left: 2, right: 2 })],
    },
    customerList = new List("customerList", options).on(
        "updated",
        function (e) {
            0 == e.matchingItems.length
                ? (document.getElementsByClassName(
                      "noresult"
                  )[0].style.display = "block")
                : (document.getElementsByClassName(
                      "noresult"
                  )[0].style.display = "none");
            var t = 1 == e.i,
                a = e.i > e.matchingItems.length - e.page;
            document.querySelector(".pagination-prev.disabled") &&
                document
                    .querySelector(".pagination-prev.disabled")
                    .classList.remove("disabled"),
                document.querySelector(".pagination-next.disabled") &&
                    document
                        .querySelector(".pagination-next.disabled")
                        .classList.remove("disabled"),
                t &&
                    document
                        .querySelector(".pagination-prev")
                        .classList.add("disabled"),
                a &&
                    document
                        .querySelector(".pagination-next")
                        .classList.add("disabled"),
                e.matchingItems.length <= perPage
                    ? (document.querySelector(
                          ".pagination-wrap"
                      ).style.display = "none")
                    : (document.querySelector(
                          ".pagination-wrap"
                      ).style.display = "flex"),
                e.matchingItems.length == perPage &&
                    document
                        .querySelector(".pagination.listjs-pagination")
                        .firstElementChild.children[0].click(),
                0 < e.matchingItems.length
                    ? (document.getElementsByClassName(
                          "noresult"
                      )[0].style.display = "none")
                    : (document.getElementsByClassName(
                          "noresult"
                      )[0].style.display = "block");
        }
    );
isCount = new DOMParser().parseFromString(
    customerList.items.slice(-1)[0]._values.id,
    "text/html"
);
function updateList() {
    var a = document.querySelector("input[name=status]:checked").value;
    (data = userList.filter(function (e) {
        var t = !1;
        return (
            "All" == a
                ? (t = !0)
                : ((t = e.values().sts == a), console.log(t, "statusFilter")),
            t
        );
    })),
        userList.update();
}
ischeckboxcheck(),
    function isStatus(e) {
        switch (e) {
            case "Active":
                return (
                    '<span class="badge badge-soft-success text-uppercase">' +
                    e +
                    "</span>"
                );
            case "Block":
                return (
                    '<span class="badge badge-soft-danger text-uppercase">' +
                    e +
                    "</span>"
                );
        }
    };
function ischeckboxcheck() {
    document.getElementsByName("checkAll").forEach(function (e) {
        e.addEventListener("click", function (e) {
            e.target.checked
                ? e.target.closest("tr").classList.add("table-active")
                : e.target.closest("tr").classList.remove("table-active");
        });
    });
}
function clearFields() {
    (customerNameField.value = ""),
        (emailField.value = ""),
        (dateField.value = ""),
        (phoneField.value = "");
}
document
    .querySelector(".pagination-next")
    .addEventListener("click", function () {
        !document.querySelector(".pagination.listjs-pagination") ||
            (document
                .querySelector(".pagination.listjs-pagination")
                .querySelector(".active") &&
                document
                    .querySelector(".pagination.listjs-pagination")
                    .querySelector(".active")
                    .nextElementSibling.children[0].click());
    }),
    document
        .querySelector(".pagination-prev")
        .addEventListener("click", function () {
            !document.querySelector(".pagination.listjs-pagination") ||
                (document
                    .querySelector(".pagination.listjs-pagination")
                    .querySelector(".active") &&
                    document
                        .querySelector(".pagination.listjs-pagination")
                        .querySelector(".active")
                        .previousSibling.children[0].click());
        });
var attroptions = {
        valueNames: [
            "name",
            "born",
            { data: ["id"] },
            { attr: "src", name: "image" },
            { attr: "href", name: "link" },
            { attr: "data-timestamp", name: "timestamp" },
        ],
    },
    attrList = new List("users", attroptions);
attrList.add({
    name: "Leia",
    born: "1954",
    image: "assets/images/users/avatar-5.jpg",
    id: 5,
    timestamp: "67893",
});
var existOptionsList = { valueNames: ["contact-name", "contact-message"] },
    existList = new List("contact-existing-list", existOptionsList),
    fuzzySearchList = new List("fuzzysearch-list", { valueNames: ["name"] }),
    paginationList = new List("pagination-list", {
        valueNames: ["pagi-list"],
        page: 3,
        pagination: !0,
    });
