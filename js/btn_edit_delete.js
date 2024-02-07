const btnDelete = document.querySelectorAll('.delete-click')
btnDelete.forEach((btn) => {
    let btnDeleteID = btn.getAttribute('data-id')
    btn.addEventListener('click', () => {
        let id = btn.getAttribute('data-id')
        if (btnDeleteID = id) {
            window.location.href = "db/check.php?action_get=delete&delete_id=" + id
        }
    })
})


const btnEdit = document.querySelectorAll('.edit-click')
btnEdit.forEach((btn) => {
    let btnEditID = btn.getAttribute('data-id')
    btn.addEventListener('click', () => {
        let id = btn.getAttribute('data-id')
        if (btnEditID = id) {
            window.location.href = "page/edit.php?&edit_id=" + id
        }
    })
})
