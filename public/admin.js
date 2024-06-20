document.addEventListener('DOMContentLoaded', function () {
    const perfumeForm = document.getElementById('perfumeForm');
    const perfumeTable = document.getElementById('perfumeTable').getElementsByTagName('tbody')[0];
    let perfumes = [];
    let editingId = null;

    perfumeForm.addEventListener('submit', function (e) {
        e.preventDefault();
        
        const id = document.getElementById('perfumeId').value;
        const name = document.getElementById('name').value;
        const brand = document.getElementById('brand').value;
        const price = document.getElementById('price').value;
        const quantity = document.getElementById('quantity').value;

        if (editingId) {
            const perfume = perfumes.find(p => p.id === editingId);
            perfume.name = name;
            perfume.brand = brand;
            perfume.price = price;
            perfume.quantity = quantity;
            editingId = null;
        } else {
            const newPerfume = {
                id: perfumes.length + 1,
                name: name,
                brand: brand,
                price: price,
                quantity: quantity
            };
            perfumes.push(newPerfume);
        }

        document.getElementById('perfumeId').value = '';
        perfumeForm.reset();
        renderTable();
    });

    function renderTable() {
        perfumeTable.innerHTML = '';
        perfumes.forEach(perfume => {
            const row = perfumeTable.insertRow();
            row.innerHTML = `
                <td>${perfume.id}</td>
                <td>${perfume.name}</td>
                <td>${perfume.brand}</td>
                <td>${perfume.price}</td>
                <td>${perfume.quantity}</td>
                <td>
                    <button onclick="editPerfume(${perfume.id})">Sửa</button>
                    <button onclick="deletePerfume(${perfume.id})">Xóa</button>
                </td>
            `;
        });
    }

    window.editPerfume = function (id) {
        const perfume = perfumes.find(p => p.id === id);
        document.getElementById('perfumeId').value = perfume.id;
        document.getElementById('name').value = perfume.name;
        document.getElementById('brand').value = perfume.brand;
        document.getElementById('price').value = perfume.price;
        document.getElementById('quantity').value = perfume.quantity;
        editingId = id;
    };

    window.deletePerfume = function (id) {
        perfumes = perfumes.filter(p => p.id !== id);
        renderTable();
    };
});
