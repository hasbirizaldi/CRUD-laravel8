// tombol hapus
$(".delete").on("click", function (e) {
    e.preventDefault();
    const href = $(this).attr("href");
    Swal.fire({
        title: "Are you sure?",
        text: "you want to delete!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Delete Data",
    }).then((result) => {
        if (result.isConfirmed) {
            document.location.href = href;
        }
    });
});
