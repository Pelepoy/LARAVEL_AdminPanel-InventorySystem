function confirmDelete(event) {
    event.preventDefault();
    const form = event.target;
    Swal.fire({
        title: "Are you sure?",
        text: "This action cannot be undone!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "Cancel",
    }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
        }
    });
}

function confirmAdd(event) {
    event.preventDefault();
    const form = event.target;
    Swal.fire({
        title: "Do you want to add this product?",
        showDenyButton: true,
        // showCancelButton: true,
        confirmButtonText: "Save",
        denyButtonText: `Cancel`,
    }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
            Swal.fire("Saved!", "", "success");
        } else if (result.isDenied) {
            Swal.fire("Adding product denied", "", "info");
        }
    });
}

function confirmEdit(event) {
    event.preventDefault();
    const form = event.target;
    const formData = new FormData(form);

    // Check if there are any changes
    let isChanged = false;
    for (const key in window.originalData) {
        if (window.originalData[key] !== formData.get(key)) {
            isChanged = true;
            break;
        }
    }

    if (!isChanged) {
        Swal.fire("No changes detected", "", "info");
        return;
    }

    Swal.fire({
        title: "Do you want to save the changes",
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: "Save",
        denyButtonText: `Cancel`,
    }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
            Swal.fire("Saved!", "", "success");
        } else if (result.isDenied) {
            Swal.fire("Changes are not saved", "", "info");
        }
    });
}


