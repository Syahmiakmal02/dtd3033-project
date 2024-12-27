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

// Function to show the selected page and hide others
function showPage(pageId) {
    // Hide all content divs
    document.getElementById('home').style.display = 'none';
    document.getElementById('bmi').style.display = 'none';
    
    // Show the selected content div
    document.getElementById(pageId).style.display = 'block';
    
    // Update active state in navigation
    document.getElementById('homeLink').classList.remove('active');
    document.getElementById('bmiLink').classList.remove('active');
    document.getElementById(pageId + 'Link').classList.add('active');
}

// When the page loads, show the home page by default
document.addEventListener('DOMContentLoaded', function() {
    showPage('home');
});