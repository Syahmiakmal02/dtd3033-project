<div class="leftcolumn">
    <div class="main-card">
        <div class="container">
            <h2>BMI Calculator</h2>
            <form id="bmiForm" method="POST" onsubmit="calculateBMI(event)">
                <label for="name">Nama:</label> <br>
                <input type="text" name="name" id="name" required> <br>
                <label for="height">height (cm):</label> <br>
                <input type="number" name="height" id="height" step="0.1" required> <br>
                <label for="weight">weight (kg):</label> <br>
                <input type="number" name="weight" id="weight" step="0.1" required> <br>
                <label for="gender">gender:</label> <br>
                <input type="radio" name="gender" id="gender_male" value="male" required> male <br>
                <input type="radio" name="gender" id="gender_female" value="female" required> female <br><br>

                <input type="submit" value="Submit">
            </form>
        </div>
    </div>


</div>