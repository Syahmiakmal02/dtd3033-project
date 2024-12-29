function calculateBMI(event) {
    event.preventDefault();

    const berat = parseFloat(document.getElementById('berat').value);
    const tinggi = parseFloat(document.getElementById('tinggi').value);
    const nama = document.getElementById('nama').value;
    const gender = document.querySelector('input[name="gender"]:checked').value;
    
    const bmiHeight = tinggi / 100;
    const bmi = berat / (bmiHeight * bmiHeight);

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

    document.getElementById('result').innerHTML = `${nama} (${gender}), BMI anda adalah ${bmi.toFixed(2)} (${category})`;

    // Update fetch URL to match your routing structure
    fetch('index.php?page=bmi', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            nama: nama,
            tinggi: tinggi,
            berat: berat,
            gender: gender,
            bmi: bmi,
            category: category
        })
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
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