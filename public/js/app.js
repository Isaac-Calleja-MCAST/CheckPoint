document.querySelectorAll(".btn-delete").forEach(btn => {
    btn.addEventListener("click", function (e) {
        e.preventDefault();

        const action = this.getAttribute("href");
        const form = document.getElementById("form-delete");

        Swal.fire({
            title: "Delete this game?",
            text: "This action cannot be undone.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#6c757d",
            confirmButtonText: "Yes, delete it",
        }).then((result) => {
            if (result.isConfirmed) {
                form.setAttribute("action", action);
                form.submit();
            }
        });
    });
});
