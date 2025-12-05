document.querySelectorAll(".btn-delete").forEach(btn => {
    btn.addEventListener("click", function (e) {
        e.preventDefault();

        const action = this.getAttribute("href");
        const form = document.getElementById("form-delete");

        // Get type from data attribute, fallback to "item"
        const itemType = this.dataset.type || "item";

        Swal.fire({
            title: `Delete this ${itemType}?`,
            text: "This action cannot be undone.",
            icon: "warning",
            showCancelButton: true,
            focusConfirm: false,
            customClass: {
                confirmButton: "btn btn-danger me-2",  // Bootstrap danger button
                cancelButton: "btn btn-secondary"      // Bootstrap secondary button
            },
            buttonsStyling: false,
            confirmButtonText: "Yes, delete it",
            cancelButtonText: "Cancel"
        }).then((result) => {
            if (result.isConfirmed) {
                form.setAttribute("action", action);
                form.submit();
            }
        });
    });
});
