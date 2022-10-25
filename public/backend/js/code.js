let deleteButtons = document.getElementsByClassName("delete");
for (let i = 0; i < deleteButtons.length; i++) {
    console.log(deleteButtons[i]);
    deleteButtons[i].addEventListener("click", function (e) {
        e.preventDefault();
        let link = e.target.getAttribute("href");
        console.log(link);

        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!",
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link;
                Swal.fire("Deleted!", "Your file has been deleted.", "success");
            }
        });
    });
}

let confirmOrder = document.getElementById("confirm");
if (confirmOrder) {
    confirmOrder.addEventListener("click", function (e) {
        e.preventDefault();
        let link = e.target.getAttribute("href");
        // console.log(link);

        Swal.fire({
            title: "Are you sure to confirm?",
            text: "Once Confirm, You will not be able to pending again",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, confirm it!",
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link;
                Swal.fire(
                    "Confirm!",
                    "Your file will be processing soon.",
                    "success"
                );
            }
        });
    });
}

let processingOrder = document.getElementById("processing");
if (processingOrder) {
    processingOrder.addEventListener("click", function (e) {
        e.preventDefault();
        let link = e.target.getAttribute("href");
        // console.log(link);

        Swal.fire({
            title: "Are you sure to processing?",
            text: "Once Processing, You will not be able to pending again",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, processing!",
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link;
                Swal.fire("Processing!", "Processing Changes", "success");
            }
        });
    });
}

let pickedOrder = document.getElementById("picked");
if (pickedOrder) {
    pickedOrder.addEventListener("click", function (e) {
        e.preventDefault();
        let link = e.target.getAttribute("href");
        // console.log(link);

        Swal.fire({
            title: "Are you sure to processing?",
            text: "Once Processing, You will not be able to pending again",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, processing!",
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link;
                Swal.fire("Processing!", "Processing Changes", "success");
            }
        });
    });
}

let shippedOrder = document.getElementById("shipped");
if (shippedOrder) {
    shippedOrder.addEventListener("click", function (e) {
        e.preventDefault();
        let link = e.target.getAttribute("href");
        // console.log(link);

        Swal.fire({
            title: "Are you sure to shipped?",
            text: "Once Shipped, You will not be able to pending again",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, shipped!",
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link;
                Swal.fire("Shipped!", "Shipped Changes", "success");
            }
        });
    });
}

let deliveredOrder = document.getElementById("delivered");
if (deliveredOrder) {
    deliveredOrder.addEventListener("click", function (e) {
        e.preventDefault();
        let link = e.target.getAttribute("href");
        // console.log(link);

        Swal.fire({
            title: "Are you sure to delivered?",
            text: "Once delivered, You will not be able to pending again",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, shipped!",
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link;
                Swal.fire("Delivered!", "Delivered Changes", "success");
            }
        });
    });
}

let cancelOrder = document.getElementById("cancel");
if (cancelOrder) {
    cancelOrder.addEventListener("click", function (e) {
        e.preventDefault();
        let link = e.target.getAttribute("href");
        // console.log(link);

        Swal.fire({
            title: "Are you sure to cancel?",
            text: "Once delivered, You will not be able to pending again",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, cancel!",
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = link;
                Swal.fire("Cancel!", "Cancel Changes", "success");
            }
        });
    });
}
