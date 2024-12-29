function calculateBMI(event) {
    event.preventDefault();

    const berat = parseFloat(document.getElementById('berat').value);
    const tinggi = parseFloat(document.getElementById('tinggi').value);  // Keep in cm
    const nama = document.getElementById('nama').value;
    const gender = document.querySelector('input[name="gender"]:checked').value;
    
    // Calculate BMI using height in meters
    const bmiHeight = tinggi / 100;  // Convert to meters for BMI calculation
    const bmi = berat / (bmiHeight * bmiHeight);

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

    // Send to server
    fetch('bmi.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            nama: nama,
            tinggi: tinggi,  // Send original height in cm
            berat: berat,
            gender: gender,
            bmi: bmi,
            category: category
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            alert('BMI data saved successfully!');
        } else {
            alert('Error saving BMI data: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Error saving BMI data. Please try again.');
    });
}