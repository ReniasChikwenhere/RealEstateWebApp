<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title> Mawanele - Bond Repayment Calculator </title>
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
                                <h1 class="fw-bolder">Bond Repayment Calculator</h1>
                            </div>
                        </div>
                    </div>

                    <!-- Bond repayment calculator -->
                    <form id="bondRepaymentCalculator">
                        <div class="row gy-3 gy-md-4 overflow-hidden">

                            <!-- Property purchase price field -->
                            <div class="col-12">
                                <label for="purchasePrice" class="form-label">Purchase Price (R) <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="purchasePrice" id="purchasePrice" placeholder="Enter property purchase price (including VAT)" required>
                                </div>
                            </div>

                            <!-- Deposit field (Optional) -->
                            <div class="col-12">
                                <label for="deposit" class="form-label">Deposit (R) <span class="text-danger"></span></label>
                                <div class="input-group">
                                    <input type="number" class="form-control" name="deposit" id="deposit" placeholder="Enter deposit (optional)">
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


                            <!-- Monthly repayments field -->
                            <div class="col-12 gy-5">
                                <b><label for="monthlyRepayments" class="form-label">Your Monthly Repayments: <span class="text-danger"></span></label></b>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="monthlyRepayments" id="monthlyRepayments" placeholder="Result..." value="" readonly>
                                </div>
                            </div>

                            <!-- Total amount repayable field -->
                            <div class="col-12">
                                <b><label for="totalRepayable" class="form-label">Total Amount Repayable: <span class="text-danger"></span></label></b>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="totalRepayable" id="totalRepayable" placeholder="Result..." value="" readonly>
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
            document.getElementById('bondRepaymentCalculator').addEventListener('submit', function(e) {
                e.preventDefault();

                // Get calculator values
                const purchasePrice = parseFloat(document.getElementById('purchasePrice').value) || 0;
                const deposit = parseFloat(document.getElementById('deposit').value) || 0;
                const interestRate = parseFloat(document.getElementById('interestRate').value) || 0;
                const loanTerm = parseFloat(document.getElementById('loanTerm').value) || 0;

                // Calculate loan amount
                const loanAmount = purchasePrice - deposit;

                // Monthly interest rate and number of payments
                const monthlyInterestRate = interestRate / 100 / 12;
                const numberOfPayments = loanTerm * 12;

                // Monthly Repayment Calculation
                const monthlyRepayment = loanAmount * (monthlyInterestRate / (1 - Math.pow(1 + monthlyInterestRate, -numberOfPayments)));
                const totalRepayable = monthlyRepayment * numberOfPayments;

                // Set results in the respective fields
                document.getElementById('monthlyRepayments').value = monthlyRepayment.toLocaleString('en-ZA', { style: 'currency', currency: 'ZAR' });
                document.getElementById('totalRepayable').value = totalRepayable.toLocaleString('en-ZA', { style: 'currency', currency: 'ZAR' });
            });
        });
    </script>
</body>

</html>