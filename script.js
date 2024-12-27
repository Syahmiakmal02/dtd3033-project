function calculateBMI(event) {
    event.preventDefault(); // Prevent form from submitting

    // Get the values from the form
    const berat = parseFloat(document.getElementById('berat').value);
    const tinggi = parseFloat(document.getElementById('tinggi').value) / 100; // Convert cm to meters
    const nama = document.getElementById('nama').value;
    const gender = document.querySelector('input[name="gender"]:checked').value;
    // Calculate BMI
    const bmi = berat / (tinggi * tinggi);

    // Determine BMI category
    let category = '';
    if (bmi < 18.5) {
        category = 'Kurus';
    } else if (bmi >= 18.5 && bmi < 24.9) {
        category = 'Normal';
    } else if (bmi >= 25 && bmi < 29.9) {
        category = 'Berlebihan Berat Badan';
    } else {
        category = 'Obesiti';
    }

    // Display the result
    document.getElementById('result').innerHTML = `${nama} (${gender}), BMI anda adalah ${bmi.toFixed(2)} (${category})`;
}

function showPage(pageId) {
    // Get all pages
    const pages = document.querySelectorAll('#home, #bmi');
    
    // Hide all pages
    pages.forEach(page => page.style.display = 'none');
    
    // Show selected page
    document.getElementById(pageId).style.display = 'block';
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', () => {
    showPage('home');
});