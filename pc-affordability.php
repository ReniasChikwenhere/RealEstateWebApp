<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title> Mawanele - Affordability Calculator </title>
    <link rel="icon" type="image/x-icon" href="/images/mawanele-logo-2.png">
</head>

<body class="bg-dark">
    <br>
    <br>
    <!-- Container -->
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-12 col-md-11 col-lg-8 col-xl-7 col-xxl-6">
                <div class="bg-white p-4 p-md-5 rounded shadow-sm">
                    <div class="row">
                        <div class="col-12">
                            <div class="text-center mb-5">
                                <!-- Mawanele logo -->
                                <img src="images/mawanele-logo-1.png" width="215" height="100" alt="Mawanele Logo 1"><br>
                                <br>
                                <!-- Heading -->
                                <h1 class="fw-bolder">Affordability Calculator</h1>
                            </div>
                        </div>
                    </div>

                    <!-- Affordability calculator -->
                    <form id="affordabilityCalculator">
                        <div class="row gy-3 gy-md-4 overflow-hidden">

                            <!-- Gross monthly income field -->
                            <div class="col-12">
                                <label for="grossMonthlyIncome" class="form-label">Gross Monthly Income (R) <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="grossMonthlyIncome" id="grossMonthlyIncome" placeholder="Enter gross monthly income" required>
                                </div>
                            </div>

                            <!-- Net monthly income field -->
                            <div class="col-12">
                                <label for="netMonthlyIncome" class="form-label">Net Monthly Income (R) <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="netMonthlyIncome" id="netMonthlyIncome" placeholder="Enter net monthly income" required>
                                </div>
                            </div>

                            <!-- Total monthly expenses field -->
                            <div class="col-12">
                                <label for="totalMonthlyExpenses" class="form-label">Total Monthly Expenses (R) <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="totalMonthlyExpenses" id="totalMonthlyExpenses" placeholder="Enter total monthly expenses" required>
                                </div>
                            </div>

                            <!-- Interest rate field -->
                            <div class="col-12">
                                <label for="interestRate" class="form-label">Interest Rate (%) <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="interestRate" id="interestRate" placeholder="Enter interest rate" step="0.01" required>
                                </div>
                            </div>

                            <!-- Loan term field -->
                            <div class="col-12">
                                <label for="loanTerm" class="form-label">Loan Term (Years) <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="loanTerm" id="loanTerm" placeholder="Enter the number of years to repay" required>
                                </div>
                            </div>


                            <!-- Amount qualified field -->
                            <div class="col-12 gy-5">
                                <b><label for="amountQualified" class="form-label">Amount You Qualify For: <span class="text-danger"></span></label></b>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="amountQualified" id="amountQualified" placeholder="Result..." value="" readonly>
                                </div>
                            </div>

                            <!-- Monthly repayment amount field -->
                            <div class="col-12">
                                <b><label for="monthlyRepayment" class="form-label">Your Monthly Repayment Amount: <span class="text-danger"></span></label></b>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="monthlyRepayment" id="monthlyRepayment" placeholder="Result..." value="" readonly>
                                </div>
                            </div>


                            <!-- Calculate button -->
                            <div class="col-12">
                                <div class="d-grid">
                                    <br>
                                    <button class="btn btn-warning btn-lg" type="submit">Calculate</button>
                                </div>
                            </div>
                        </div>

                        <!-- Back to property calculators page -->
                        <center>
                            <div class="col-12">
                                <div class="d-grid">
                                    <br>
                                    <a href="property-calculators.php"><button class="btn btn-secondary btn-lg" type="button">Back</button></a>
                                </div>
                            </div>
                        </center>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('affordabilityCalculator').addEventListener('submit', function(e) {
                e.preventDefault();

                // Get input values
                const grossMonthlyIncome = parseFloat(document.getElementById('grossMonthlyIncome').value) || 0;
                const netMonthlyIncome = parseFloat(document.getElementById('netMonthlyIncome').value) || 0;
                const totalMonthlyExpenses = parseFloat(document.getElementById('totalMonthlyExpenses').value) || 0;
                const interestRate = parseFloat(document.getElementById('interestRate').value) || 0;
                const loanTerm = parseFloat(document.getElementById('loanTerm').value) || 0;

                // Calculate affordable monthly repayment as 30% of gross monthly income
                const affordableMonthlyRepayment = grossMonthlyIncome * 0.3;

                // Monthly interest rate and total number of payments
                const monthlyInterestRate = interestRate / 100 / 12;
                const numberOfPayments = loanTerm * 12;

                // Calculate the maximum loan amount (P) based on the affordable monthly repayment
                const maxLoanAmount = affordableMonthlyRepayment / (monthlyInterestRate / (1 - Math.pow(1 + monthlyInterestRate, -numberOfPayments)));

                // Display results
                document.getElementById('amountQualified').value = maxLoanAmount.toLocaleString('en-ZA', {
                    style: 'currency',
                    currency: 'ZAR'
                });
                document.getElementById('monthlyRepayment').value = affordableMonthlyRepayment.toLocaleString('en-ZA', {
                    style: 'currency',
                    currency: 'ZAR'
                });
            });
        });
    </script>
</body>

</html>