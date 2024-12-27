function calculateBMI(event) {
    event.preventDefault(); // Prevent form from submitting

    // Get the values from the form
    const berat = parseFloat(document.getElementById('berat').value);
    const tinggi = parseFloat(document.getElementById('tinggi').value) / 100; // Convert cm to meters
    const nama = document.getElementById('nama').value;

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
    document.getElementById('result').innerHTML = `${nama}, BMI anda adalah ${bmi.toFixed(2)} (${category})`;
}
