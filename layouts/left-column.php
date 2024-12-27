<div class="leftcolumn">
    <div class="main-card">
        <div class="container">
            <h2>BMI Calculator</h2>
            <form id="bmiForm" method="POST" onsubmit="calculateBMI(event)">
                <label for="nama">Name:</label> <br>
                <input type="text" name="nama" id="nama" required> <br>

                <label for="tinggi">Height (cm):</label> <br>
                <input type="number" name="tinggi" id="tinggi" step="0.1" required> <br>

                <label for="berat">Weight (kg):</label> <br>
                <input type="number" name="berat" id="berat" step="0.1" required> <br>

                <label for="gender">Gender:</label> <br>
                <input type="radio" name="gender" id="gender_male" value="male" required> Male <br>
                <input type="radio" name="gender" id="gender_female" value="female" required> Female <br><br>

                <input type="submit" value="Calculate BMI">
                <div id="result"></div>
            </form>
        </div>
    </div>


</div>