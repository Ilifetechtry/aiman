<script>
function confirmDelete(id) {
    Swal.fire({
        title: '<i class="ni ni-trash-alt" style="color:red;font-size:50px;display:block"></i><br> Are you sure want to delete?',
        showCancelButton: true,
        confirmButtonColor: '#e24f5f',
        cancelButtonColor: '#2daae0',
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = delete_url + id;
        }
    });
}
</script>