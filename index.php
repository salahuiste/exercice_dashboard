<?php
    include("includes/card_infos.php");
    include("includes/index_utils.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banking Dashboard</title>
    <link rel="stylesheet" href="css/navbar.css" />
    <link rel="stylesheet" href="css/header.css" />
    <link rel="stylesheet" href="css/charts.css" />
    <link rel="stylesheet" href="css/section.css" />
</head>

<body>
    <nav class="navbar">
        <a class="navbar-brand" href="#">
            <div class="icon-container">
                <img class="icon hexagon" />
            </div>
            <span class="name">Dashboard</span>
        </a>
        <ul class="navbar-nav">
            <li>
                <a class="active"><img class="icon home" /><span>Home</span></a>
            </li>
            <li>
                <a><img class="icon statistics" /><span>Statistics</span></a>
            </li>
            <li>
                <a><img class="icon mail" /><span>Messages</span></a>
            </li>
            <li>
                <a><img class="icon user" /><span>Profile</span></a>
            </li>
            <li>
                <a><img class="icon file" /><span>Documents</span></a>
            </li>
        </ul>
        <div class="navbar-footer">
                <img class="image-documents" src="./img/documents.svg" alt="documents" />
                
        </div>
    </nav>
    <main>
        <header>
            <section role="search">
                <form action="#" method="get">
                    <div class="form-inline">
                        <img class="icon search" />
                        <input type="search" placeholder="Search" />
                    </div>
                </form>
            </section>

            <section role="application">
                <button class="change-view">
                    <img class="icon layout" />Change view
                </button>
                <button class="notification">
                    <img class="icon notification" />
                </button>
                <button class="menu">
                    <img class="icon menu" />
                </button>
            </section>
        </header>
        <div class="account_details">
            <div class="item1">
                <h3>Banking Dashboard</h3>
                <p>Welcome Back Mr.<?php echo $account->getLastName();?></p>
            </div>
            <div class="item2">
                <p id="balance_label">Your Balance</p>
                <h2 id="balance"><?php echo $account->getCurrentBalance();?>€</h2>
            </div>
        </div>
        <div class="balance_cards">
            <div><h3>Your Current Balance(<?php echo count($account->getCards()); ?>)</h3></div>
            
        </div>
        
        <div class="charts-wrapper">
            <div class="navcards">
                    <h3><a href="#" id="back_btn" class="a_btn"><-Back</a></h3>
            </div>
            <section role="credit-card" style="margin: 0 auto;">
                <div class="top" >
                    <img src="./img/mastercard.svg" />
                    <img src="./img/apple_pay.svg" class="apple_pay" />
                </div>
                <div class="ccNumber" >
                    <span id="cc_num">˙˙˙˙ ˙˙˙˙ ˙˙˙˙ <?php $cc=$account->getCards()[0]; echo substr($cc->getCcNumber(), -4);?></span>
                </div>
                <div class="ccBottom">
                    <div class="ccValidThru">
                        <label>VALID THRU</label>
                        <span id="cc_datexp"><?php echo $cc->getDateExp(); ?></span>
                    </div>
                    <div class="ccCardHolder">
                        <label>CARD HOLDER</label>
                        <span id="cc_holdername"><?php echo $cc->getHolderName(); ?></span>
                    </div>
                </div>
            </section>
            <div class="navcards">
                    <h3><a href="#" id="next_btn" class="a_btn">Next-></a>
                </div>
        </div>
        <!-- The Modal -->
        <div id="myModal" class="modal">

          <!-- Modal content -->
          <div class="modal-content">
            <span class="close">&times;</span>
            <div class="popup_div" align="center">
                <table>
                      <tr>
                          <td class="title_popup">Transaction Id:</td>
                          <td id="tr_id"></td>
                      </tr>
                      <tr>
                          <td class="title_popup">Date:</td>
                          <td id="tr_date"></td>
                      </tr>
                      <tr>
                          <td class="title_popup">Account id:</td>
                          <td id="tr_acc"></td>
                      </tr>
                      <tr>
                          <td class="title_popup">Amount:</td>
                          <td id="tr_amount"></td>
                      </tr>
                      <tr>
                          <td class="title_popup">Currency:</td>
                          <td id="tr_cur"></td>
                      </tr>
                      <tr>
                          <td class="title_popup">Type:</td>
                          <td id="tr_type"></td>
                      </tr>
                      <tr>
                          <td class="title_popup">Status:</td>
                          <td id="tr_status"></td>
                      </tr>
                    </table>
            </div>
          </div>

        </div>
        <div class="transactions">
            <div class="tr_item1">
                <h3>My transactions:</h3>
            </div>
            <div class="tr_item2">
                <table class="transaction_tab">
                      <caption>Statement Summary</caption>
                      <thead>
                        <tr>
                          <th scope="col">Id Transaction</th>
                          <th scope="col">Date</th>
                          <th scope="col">Amount</th>
                          <th scope="col">Status</th>
                        </tr>
                      </thead>
                      <tbody id="tbody_tr">
                        <?php
                            Page::printTransactions($account->getTransactions(),3);
                        ?>
                      </tbody>
                    </table>
            </div>
        </div>
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
    </script>
    <script src="js/main.js"></script>

</body>

</html>