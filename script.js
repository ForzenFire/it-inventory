document.getElementById('inventory-form').addEventListener('submit', function (e) {
    e.preventDefault();

    const equipmentName = document.getElementById('equipment-name').value;
    const serialNumber = document.getElementById('serial-number').value;
    const model = document.getElementById('model').value;
    const department = document.getElementById('department').value;
    const location = document.getElementById('location').value;

    fetch('insert.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            equipment_name: equipmentName,
            serial_number: serialNumber,
            model: model,
            department: department,
            location: location
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            loadEquipment();
            document.getElementById('inventory-form').reset();
        } else {
            alert('Error: ' + data.message);
        }
    });
});

document.getElementById('clear-button').addEventListener('click', function () {
    document.getElementById('inventory-form').reset();
});

function loadEquipment() {
    fetch('fetch.php')
    .then(response => response.json())
    .then(data => {
        const tbody = document.querySelector('#equipment-list tbody');
        tbody.innerHTML = '';
        data.forEach((item, index) => {
            tbody.innerHTML += `<tr>
                <td>${index + 1}</td>
                <td>${item.equipment_name}</td>
                <td>${item.serial_number}</td>
                <td>${item.model}</td>
                <td>${item.department}</td>
                <td>${item.location}</td>
            </tr>`;
        });
    });
}

// Load equipment on page load
document.addEventListener('DOMContentLoaded', loadEquipment);
