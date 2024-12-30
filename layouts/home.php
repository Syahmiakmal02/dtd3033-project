<div class="container">
    <!-- Left Column -->
    <div class="left-column">
        <h2>Welcome to BMI Calculator</h2>
        <div class="bmi-chart">
            <h3>BMI Categories</h3>
            <table>
                <tr>
                    <th>Category</th>
                    <th>BMI Range</th>
                </tr>
                <tr>
                    <td>Underweight</td>
                    <td>Below 18.5</td>
                </tr>
                <tr>
                    <td>Normal</td>
                    <td>18.5 - 24.9</td>
                </tr>
                <tr>
                    <td>Overweight</td>
                    <td>25 - 29.9</td>
                </tr>
                <tr>
                    <td>Obesity</td>
                    <td>30 and Above</td>
                </tr>
            </table>
        </div>
    </div>

    <!-- Right Column -->
    <div class="right-column">
        <div class="bmi-info">
            <h3>What is BMI?</h3>
            <p>Body Mass Index (BMI) is a simple calculation based on a person’s height and weight. It helps you understand whether your body weight is healthy for your height.</p>
        </div>
        <div class="bmi-benefits">
            <h3>Benefits of Knowing Your BMI</h3>
            <ul>
                <li>Helps you understand your weight category.</li>
                <li>Provides insights into potential health risks.</li>
                <li>Acts as a guide for setting fitness goals.</li>
            </ul>
        </div>
    </div>
</div>

<!-- CSS for layout -->
<style>
    .container {
        display: flex;
        gap: 20px;
    }

    .left-column {
        flex: 3;
    }

    .right-column {
        flex: 1;
        border-left: 1px solid #ccc;
        padding-left: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    table th, table td {
        border: 1px solid #ccc;
        padding: 10px;
        text-align: left;
    }

    table th {
        background-color: #f4f4f4;
    }
</style>
