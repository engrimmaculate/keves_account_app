<base href="/public">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KEVES IN  & SUITES | PROFITS & LOSS REPORT</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />

    <!-- Style CSS -->
    <link rel="stylesheet" href="{{asset('assets/pettycash/style.css')}}">
    
</head>
<body>

    <div class="main">
        <div>
            <img src="../../assets/logo-2-1.png" alt="KEVES INN & SUITES" width="100%" height="100PX" />
        </div>
        <div class="d-flex flex-row">
            <h3 class="col-md justify-content-center align-items-center text-center">PROFITS & LOSS REPORT FROM : {{$data['start_date']}}  -  {{$data['end_date']}}</h1>
            <span><a class="btn btn-danger mb-2 flex-stretch" href="{{route('profitor-loss.index')}}">Return Back</a></span>
        </div>
        
        <div class="row">
            <div class="added-product col-12">
                <div class="product-table">
                    <table class="table text-center table-responsive-md">
                        <thead class="bg-danger text-white fw-bold text-2xl">
                          <tr>
                            <th scope="col">INCOME FROM OPERATION</th>
                            <th scope="col">AMOUNT</th>
                            
                          </tr>
                        </thead>
                        <tbody id="productTableBody">
                           @foreach ($income_reports as $income_report)
                            <tr>
                                <td class="fw-bold 2.0rem">
                                  
                                    {{$income_report->category}}
                                </td>
                                <td class="fw-bold 2.0rem">{{number_format($income_report->amount,2)}}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td class="fw-bold 2.0rem">GROSS INCOME</td>
                                <td class="fw-bold 2.0rem">{{number_format($data['income'],2)}}</td>
                            </tr>
                        </tbody>
                        <tbody id="productTableBody">
                        <thead class="bg-danger text-white fw-bold text-2xl">
                          <tr>
                            <th scope="col">ALL EXPENSES ( DIRECT & INDIRECT )</th>
                            <th scope="col">AMOUNT</th>
                            
                          </tr>
                        </thead>
                             @foreach ($expense_reports as $expense_report)
                            <tr>
                                <td class="fw-bold 2.0rem">{{$expense_report->category}}</td>
                                <td class="fw-bold 2.0rem">{{number_format($expense_report->amount,2)}}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td class="fw-bold 2.0rem">DIRECT EXPENSES TOTAL</td>
                                <td class="fw-bold 2.0rem"><strike>N</strike> {{number_format($data['expenses'],2)}}</td>
                            </tr>
                        </tbody>
                        <!-- <tbody id="productTableBody">
                            <thead class="bg-danger text-white fw-bold text-2xl">
                            <tr>
                                <th scope="col">OTHER INCOME</th>
                                <th scope="col">AMOUNT</th>
                                
                            </tr>
                            </thead>
                             @foreach ($expense_reports as $expense_report)
                            <tr>
                                <td class="fw-bold 2.0rem">{{$expense_report->expense_category_id}}</td>
                                <td class="fw-bold 2.0rem">{{$expense_report->amount}}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td class="fw-bold 2.0rem">DIRECT EXPENSES</td>
                                <td class="fw-bold 2.0rem"><strike>N</strike> {{number_format(($data['income'] - $data['expenses']),2)}}</td>
                            </tr>
                        </tbody> -->
                        <!-- <tbody id="productTableBody">
                            <thead class="bg-danger text-white fw-bold text-2xl">
                            <tr>
                                <th scope="col">Selling & Distribution Expenses</th>
                                <th scope="col">AMOUNT</th>
                                
                            </tr>
                            </thead>
                                @foreach ($expense_reports as $expense_report)
                                <tr>
                                    <td class="fw-bold 2.0rem">{{$expense_report->expense_category_id}}</td>
                                    <td class="fw-bold 2.0rem">{{$expense_report->amount}}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td class="fw-bold 2.0rem">GRAND TOTAL</td>
                                    <td class="fw-bold 2.0rem"><strike>N</strike> {{number_format(($data['income'] - $data['expenses']),2)}}</td>
                                </tr>
                        </tbody>
                        <tbody id="productTableBody">
                            <thead class="bg-danger text-white fw-bold text-2xl">
                            <tr>
                                <th scope="col">ADMINISTRATIVE EXPENSES</th>
                                <th scope="col">AMOUNT</th>
                                
                            </tr>
                            </thead>
                                @foreach ($expense_reports as $expense_report)
                                <tr>
                                    <td class="fw-bold 2.0rem">{{$expense_report->expense_category_id}}</td>
                                    <td class="fw-bold 2.0rem">{{$expense_report->amount}}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td class="fw-bold 2.0rem">GRAND TOTAL</td>
                                    <td class="fw-bold 2.0rem"><strike>N</strike> {{number_format(($data['income'] - $data['expenses']),2)}}</td>
                                </tr>
                        </tbody>
                        <tbody id="productTableBody">
                            <thead class="bg-danger text-white fw-bold text-2xl">
                            <tr>
                                <th scope="col">TAX  EXPENSES</th>
                                <th scope="col">AMOUNT</th>
                                
                            </tr>
                            </thead>
                                @foreach ($expense_reports as $expense_report)
                                <tr>
                                    <td class="fw-bold 2.0rem">{{$expense_report->expense_category_id}}</td>
                                    <td class="fw-bold 2.0rem">{{$expense_report->amount}}</td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td class="fw-bold 2.0rem">GRAND TOTAL</td>
                                    <td class="fw-bold 2.0rem"><strike>N</strike> {{number_format(($data['income'] - $data['expenses']),2)}}</td>
                                </tr>
                        </tbody> -->
                        <tfoot>
                        <tr>
                            <th scope="col">NET PROFIT OR LOSS</th>
                            <th scope="col"><strike>N</strike> {{number_format($data['closing_bal'],2)}}</th>
                            
                          </tr>
                        </tfoot>
                    </table>
                    
                </div>

                <div class="table-footer row">
                    <p class="col-4">CLOSING BALANCE: <span id="totalAmount"><strike>N</strike> {{number_format($data['closing_bal'],2)}}</span></p>
                    
                    <button type="button" id="generateInvoice" class="btn btn-danger" onclick="window.print('#pettycash')">Print</button>
                </div>
                
            </div>
        </div>
    </div>

   
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>

    <!-- Script JS -->
    <script src="{{asset('assets/pettycash/script.js')}}"></script>
</body>
</html>