<?php

class crud
{
    private $db;
    private $ln;
    private $routine_run_flag;

    public function __construct($DB_con, $lang)
    {
        $this->db = $DB_con;
        $this->ln = $lang;
        $this->routine_run_flag = false;
    }

    public function addHash($email)
    {
        $hash = hash('md5', strtotime(date('Y-m-d h:i:sa')));
        $queryAddDomain =
        "UPDATE bo_user SET passhash = :passhash, last_login='" .
        date('Y-m-d h:i:sa') .
            "' WHERE email = :email";
        $stmt = $this->db->prepare($queryAddDomain);
        $stmt->bindparam(':passhash', $hash);
        $stmt->bindparam(':email', $email);
        $stmt->execute();
        return $hash;
    }

    // Get User details with hash
    public function getUserByHash(
        $hash = '',
        $date = 'created_at',
        $flag = true
    ) {
        if ($hash == '') {
            return false;
        }
        $sql = 'SELECT * FROM admin WHERE passhash = :passhash';
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':passhash', $hash);
        $stmt->execute();
        $user = false;
        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
        }
        return $user;
    }

    // Get User details with QR code
    public function getUserByQRcode($token) {
        
        // $sql = "SELECT seed.*, investment.* FROM investment LEFT JOIN seed ON seed.id = investment.user_id WHERE investment.qr_link='$token'";
        // $sql = "SELECT * FROM seed WHERE qr_link='$token'";
        $sql = "SELECT * FROM seed WHERE qr_link='$token'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $user = false;
        if ($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            return $user;
        } else return false;
    }
    
    public function getFaqs() {
        $sql = 'SELECT * FROM faq ORDER BY id';
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $faq = [];
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $faq[] = $row;
            }
        } else return false;
        return $faq;
    }
    
    public function getAllInvestments() {
        $sql = "SELECT * FROM ps1f;";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $list_string = "";
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                if ($row['payed'] == 0) {
                    $payed = "<span class='user-status block' style='font-size: 12px;'>pending</span>";
                    $addingStatus =
                        "<a href='#' data-status='1' data-id='" . $row['id'] .
                        "' class='updateInvestmentStatus' data-bs-toggle='tooltip' title='Mark as Payed' style='z-index:2;color: red; margin-right:5px;'><i class='fas fa-minus-circle' style='font-size: 16px;'></i></a>";
                } else {
                    $date = date_format(date_create($row['payed_date']),"d.m.Y");
                    $payed = "<span class='user-status active payed-status' style='font-size: 12px;' style='cursor: pointer;' data-html='true' data-toggle='tooltip' title='$date'>payed</span>";
                    $addingStatus =
                        "<a href='#' data-status='0' data-id='" . $row['id'] .
                        "' class='updateInvestmentStatus' data-bs-toggle='tooltip' title='Mark as UnPayed' style='z-index:2;color: green; margin-right:5px;'><i class='fas fa-check-circle' style='font-size: 16px;'></i></a>";
                }
                if(trim($row['wallet']) == "") {
                    $wallet = "<span class='user-status block' style='margin-top: 5px;font-size: 12px;'>Wallet <i class='fa-solid fa-wallet' style='padding-left: 2.5px; font-size: 12px;'></i></span>";
                } else {
                    $wallet = "<span class='user-status wallet-status' style='margin-top: 5px; font-size: 12px; margin-top: 5px; background-color: #001c40 !important; color: #fff !important;cursor: pointer;' data-html='true' data-toggle='tooltip' title='".$row['wallet']."'>Wallet <i class='fa-solid fa-wallet' style='padding-left: 2.5px; font-size: 12px;'></i></span>";
                }
                if ($row['kyc_files'] == "") {
                    $kyc_files = "";
                } else {
                    $files = explode(",", $row['kyc_files']);
                    $kyc_files =
                        "<p><a href='#' data-file='" . $files[0] .
                        "' class='viewKYC' data-bs-toggle='modal' title='View KYC' data-bs-target='#viewKYCModal' style='color: green; margin-right:5px;'>" .  substr($files[0], 0, 5) . "..." . substr($files[0], -6) . "</a></P>";
                    if (count($files) > 1) {
                        $kyc_files = $kyc_files .
                            "<p><a href='#' data-file='" . $files[1] .
                            "' class='viewKYC' data-bs-toggle='modal' title='View KYC' data-bs-target='#viewKYCModal' style='color: green; margin-right:5px;'>" .  substr($files[1], 0, 5) . "..." . substr($files[1], -6) . "</a></P>";
                    }
                } 

                $view = "<a href='#' data-id='" . $row['id'] . "' class='viewInvestment' data-bs-toggle='modal' title='View Investment' data-bs-target='#viewInvestmentModal' style='margin-right:5px; color:#007bff'><i class='fas fa-eye' style='font-size: 16px;'></i></a>";
                

                $edit = "<a href='#' data-id='" . $row['id'] . "' class='editInvestment' data-bs-toggle='modal' title='Edit Investment' data-bs-target='#editInvestmentModal' style='margin-left:5px; color:#007bff'><i class='fas fa-edit' style='font-size: 16px;'></i></a>";
                
                $reg_date = date_create($row['reg_date']);
                $reg_date = date_format($reg_date, 'd.m.Y');
                $list_string .=
                    '<tr>' .
                    "<td class='symbol-detect' data-search='{$row['firstname']} {$row['lastname']}' data-sort='{$row['lastname']}'>
                    <div class='d-flex justify-content-between'><p><b>{$row['firstname']} {$row['lastname']}</b></p> <p>{$row['id']}</p></div>
                    <p>{$row['address']}</p>
                    <div class='d-flex justify-content-between'>
                        <p>{$row['zipcode']} {$row['city']}, {$row['country']}</p>
                    </div>
                    <p class='d-flex align-items-center justify-content-between'>{$row['email']}
                    </p>
                    </td>" .
                    "<td class='c text-center' data-sort='{$row['telephone']}'>
                    {$row['telephone']}
                    </td>" .
                    "<td class='c text-center'>" . $reg_date . "</td>" .
                    "<td class='c text-center'>" .
                    $kyc_files .
                    '</td>' .
                    "<td class='c text-center'>" .
                    $row['redux_token'] .
                    '</td>' .
                    "<td class='c text-center'>" .
                    $row['price'] .
                    '</td>' .
                    "<td class='c text-center'>" .
                    $row['invest_amount'] .
                    '</td>' .
                    "<td class='c text-center'>" .
                    $row['currency'] .
                    '</td>' .
                    "<td class='c text-center' data-id='{$row['id']}'>" .
                    $payed. "<br>" . $wallet .
                    '</td>'.
                    "<td class='c text-center'>" . $addingStatus . $edit ."</td>".
                    '</tr>';
            }
            return $list_string;
        } else return "";
    }
    
    public function getAllNews() {
        $sql = "SELECT * FROM news;";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $list_string = "";
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                if ($row['status'] == 0) {
                    $addingStatus =
                        "<a href='#' data-status='1' data-id='" . $row['id'] .
                        "' class='updateNewsStatus' data-bs-toggle='tooltip' title='Activate News' style='color: red; margin-right:5px;'><i class='fas fa-minus-circle'></i></a>";
                } else {
                    $addingStatus =
                        "<a href='#' data-status='0' data-id='" . $row['id'] .
                        "' class='updateNewsStatus' data-bs-toggle='tooltip' title='Disable News' style='color: green; margin-right:5px;'><i class='fas fa-check-circle'></i></a>";
                } 
                $edit = "<a href='#' data-id='" . $row['id'] . "' class='editNews' style='margin-right:5px; color:#007bff'><i class='fas fa-edit'></i></a>";
                $delete = "<a href='#' data-id='" . $row['id'] . "' class='deleteNews' data-bs-toggle='modal' title='Delete News' data-bs-target='#deleteNewsModal' style='color: grey'><i class='fas fa-trash'></i></a>";
                if(strlen($row['en_title']) > 20) $en_title = substr($row['en_title'], 0, 20) . " ...";
                else $en_title = $row['en_title'];
                if(strlen($row['de_title']) > 20) $de_title = substr($row['de_title'], 0, 20) . " ...";
                else $de_title = $row['de_title'];
                if(strlen($row['en_news_short']) > 20) $en_short = substr($row['en_news_short'], 0, 20) . " ...";
                else $en_short = $row['en_news_short'];
                if(strlen($row['de_news_short']) > 20) $de_short = substr($row['de_news_short'], 0, 20) . " ...";
                else $de_short = $row['de_news_short'];
                if(strlen($row['en_news_complete']) > 20) $en_content = substr($row['en_news_complete'], 0, 20) . " ...";
                else $en_content = $row['en_news_complete'];
                if(strlen($row['de_news_complete']) > 20) $de_content = substr($row['de_news_complete'], 0, 20) . " ...";
                else $de_content = $row['de_news_complete'];
                if($row['expired'] == "0000-00-00") $row['expired'] = "";
                
                $list_string .=
                    '<tr>' .
                    "<td class='c'> <img width=60 src='../" .
                    $row['image'] .
                    "'></td>" .
                    "<td class='c'>" .
                    $en_title .
                    '</td>' .
                    "<td class='c'>" .
                    $en_short .
                    '</td>' .
                    "<td class='c'>" .
                    $en_content .
                    '</td>' .
                    "<td class='c'>" .
                    $de_title .
                    '</td>' .
                    "<td class='c'>" .
                    $de_short .
                    '</td>' .
                    "<td class='c'>" .
                    $de_content .
                    '</td>' .
                    "<td class='c'>" . $row['expired'] . "</td>" .
                    "<td class='c'>" . $addingStatus . $edit . $delete ."</td>".
                    '</tr>';
            }
            return $list_string;
        } else return "";
    }
    
    public function getNews($id) {
        $sql = "SELECT * FROM news WHERE id = $id;";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $news = false;
        if ($stmt->rowCount() > 0) {
            $news = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!is_null($news["expired"])) $news['expired'] = date_format(date_create($news['expired']), 'm.d.Y');
            return $news;
        } else return false;
    }
    
    public function updateNewsStatus($id, $status) {
        $sql = "UPDATE news SET status = $status WHERE id = $id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return false;
    }

    public function deleteNews($id) {
        $sql = "DELETE FROM news WHERE id = $id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return false;
    }

    public function getEnableNews() {
        $now = date("Y-m-d");
        $lang = $_SESSION['lang'];
        $sql = "SELECT * FROM news WHERE status = 1 AND (expired = null OR expired >= '$now')";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $news_list = [];
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $news = [];
                $news['title'] = $row[$lang . "_title"];
                $news['short'] = $row[$lang . "_news_short"];
                $news['full_text'] = $row[$lang . "_news_complete"];
                $news['image'] = $row['image'];
                $news_list[] = $news;
            }            
            return json_encode($news_list);
        } else return false;
    }

    public function addSubscriber($email, $ip) {        
        $sql = "SELECT * FROM email_newsletter WHERE email = '" . $email . "';";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $user = false;
        if ($stmt->rowCount() > 0) {
            return false;
        } else {
            $query = "INSERT INTO email_newsletter(email, lang, status, client_ip) VALUES('$email', '" . $_SESSION["lang"] . "', 1, '$ip');";
            $smt = $this->db->prepare($query);
            $smt->execute();
            return true;
        }
    }

    public function addContact($email, $name, $number, $cn, $message) {        
        // $sql = "SELECT * FROM contact WHERE email = '" . $email . "';";
        // $stmt = $this->db->prepare($sql);
        // $stmt->execute();
        // $user = false;
        // if ($stmt->rowCount() > 0) {
        //     return false;
        // } else {
        $query = "INSERT INTO contact(email, name, number, cn, msg) VALUES('$email', '$name', '$number', '$cn', '$message');";
        $smt = $this->db->prepare($query);
        $smt->execute();
        return true;
        // }
    }

    public function addNews($en_title, $de_title, $en_news_short, $de_news_short, $en_news_complete, $de_news_complete, $image, $expired) {
        $query = "INSERT INTO news(en_title, de_title, en_news_short, de_news_short, en_news_complete, de_news_complete, image, expired) VALUES('$en_title', '$de_title', '$en_news_short', '$de_news_short', '$en_news_complete', '$de_news_complete', '$image', '$expired');";
        $smt = $this->db->prepare($query);
        $smt->execute();
        return true;
    }

    public function updateNews($news_id, $en_title, $de_title, $en_news_short, $de_news_short, $en_news_complete, $de_news_complete, $image, $expired) {
        $query = "UPDATE news SET en_title = '$en_title', de_title = '$de_title', en_news_short = '$en_news_short', de_news_short = '$de_news_short', en_news_complete = '$en_news_complete', de_news_complete = '$de_news_complete', image = '$image', expired = '$expired' WHERE id = $news_id;";
        $smt = $this->db->prepare($query);
        $smt->execute();
        return true;
    }
    
    public function getCountry($lang)
    {
        $query = "SELECT * FROM country WHERE symbol != 'DE' AND symbol != 'CH' AND symbol != 'AT' ORDER BY $lang;";
        $stmt = $this->db->prepare($query);   
        $stmt->execute();
        $result = [];
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $result[] = $row;
            }
        }
        return $result;
    }

    public function getCurrencyRate()
    {
        $query = "SELECT ps1f_eur, ps1f_chf FROM settings;";
        $stmt = $this->db->prepare($query);   
        $stmt->execute();
        $result = [];
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $result = $row;
            }
        }
        return $result;
    }

    public function addEmailCollect($email, $ip)
    {
        $sql = "SELECT * FROM email_interests WHERE email = '" . $email . "';";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return false;
        } else {
            $query = "INSERT INTO email_interests(email, client_ip) VALUES('$email', '$ip');";
            $smt = $this->db->prepare($query);
            $smt->execute();
            return true;
        }
    }

    public function removeEmailCollect($email)
    {
        $sql = "DELETE FROM email_interests WHERE email = '" . $email . "';";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return true;
    }

    public function removeEmailSubscriber($email)
    {
        $sql = "DELETE FROM email_newsletter WHERE email = '" . $email . "';";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return true;
    }

    public function get_investment($id)
    {
        $sql = "SELECT * FROM ps1f WHERE id = '$id';";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $result = $row;
            }
        }
        return $result;
    }

    public function set_update_time()
    {
        $now = new DateTime("now", new DateTimeZone("UTC"));
        $now = $now->format('Y-m-d H:i:s');
        $sql = "UPDATE transactions SET updated_at = '$now';";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return true;
    }

    public function get_last_update_time()
    {
        $sql = "SELECT * FROM transactions ORDER BY id DESC LIMIT 1;";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = [];
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row['updated_at'];
        } else return "notime";
    }

    public function getTxHashs()
    {
        $sql = "SELECT hash FROM transactions;";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = [];
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $result[] = $row['hash'];
            }
            return $result;
        } else return [];
    }

    public function get_last_block()
    {
        $sql = "SELECT * FROM transactions ORDER BY id DESC LIMIT 1;";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = [];
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {                   
                $result = $row;
            }
            return $result['blockNumber'];
        } else return 0;
    }

    public function get_transactionType($hash)
    {
        $curlSession = curl_init();
        $url = "https://bscscan.com/tx/" . $hash;
        curl_setopt($curlSession, CURLOPT_URL, $url);
        curl_setopt($curlSession, CURLOPT_BINARYTRANSFER, true);
        curl_setopt($curlSession, CURLOPT_RETURNTRANSFER, true);
        $trans_content = curl_exec($curlSession);
        $type = 'purchase';
        if(strpos($trans_content, "Function: swap")) {
            $type = "swap";
        } else if (strpos($trans_content, "Function: transfer")) {
            $type = "transfer";
        }
        curl_close($curlSession);
        return $type;
    }

    public function get_transactions()
    {
        $sql = "SELECT * FROM transactions ORDER BY timestamp DESC;";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = [];
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $result[] = $row;
            }
        }
        return $result;
    }

    public function insertTransaction($transactionIndex, $contractAddress, $blockNumber, $blockHash, $from, $to, $datetime, $timeStamp, $value, $tokenDecimal, $tokenSymbol, $quantity)
    {
        $sql = "SELECT * FROM transactions WHERE hash = :blockHash;";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(':blockHash', $blockHash);
        $stmt->execute();
        $now = new DateTime("now", new DateTimeZone("UTC"));
        $now = $now->format('Y-m-d-H:i:s');
        if ($stmt->rowCount() == 0) {
            $type = $this->get_transactionType($blockHash);
            $sql = "INSERT INTO transactions(transactionIndex, contractAddress, blockNumber, hash, fromAddress, toAddress, datetime, timestamp, value, tokenDecimal, symbol, quantity, transaction_type, created_at, updated_at) VALUES ('$transactionIndex', '$contractAddress', '$blockNumber', '$blockHash', '$from', '$to', '$datetime', '$timeStamp', '$value', '$tokenDecimal', '$tokenSymbol', '$quantity', '$type', '$now', '$now');";
            $stmt_ = $this->db->prepare($sql);           
            $stmt_->execute();
        }
        return true;
    }

    public function getProducts()
    {
        $sql = "SELECT * FROM product ORDER BY name;";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = [];
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $result[] = $row;
            }
        }
        return $result;
    }

    public function getProductsStatus()
    {
        $sql = "SELECT * FROM product ORDER BY name;";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = [];
        $total = 0;
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $sql = "SELECT count(twitter_name) AS count_vote FROM vote WHERE product_id = :id;";
                $stmt_ = $this->db->prepare($sql);
                $stmt_->bindparam(":id", $row['id']);
                $stmt_->execute();
                if ($stmt_->rowCount() > 0) {
                    $row_ = $stmt_->fetch(PDO::FETCH_ASSOC);
                    $row['count_vote'] = $row_['count_vote'];
                } else $row['count_vote'] = 0;
                $total = $total + $row['count_vote'];
                $result[] = $row;
            }
        }
        $re_ = [];
        foreach ($result as $key => $pro) {
            if($total != 0) $pro['value'] = $pro['count_vote'] * 100 / $total;
            else $pro['value'] = 0;
            $re_[] = $pro;
        }
        return $re_;
    }

    public function vote_product($id, $username)
    {
        $sql = "SELECT * FROM vote WHERE product_id=:id AND twitter_name=:username";
        $stmt = $this->db->prepare($sql);
        $stmt->bindparam(":id", $id);
        $stmt->bindparam(":username", $username);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return false;
        } else {
            $sql = "INSERT INTO vote(product_id, twitter_name) VALUES('$id', '$username');";
            $stmt_ = $this->db->prepare($sql);
            $stmt_->execute();
        }
        return true;
    }

    public function get_bitmart_info()
    {
        $query = "SELECT cancel_order_confirm, bitmart_access_key, bitmart_secret_key, bitmart_memo FROM settings;";
        $stmt = $this->db->prepare($query);   
        $stmt->execute();
        $result = [];
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $result = $row;
            }
        }
        return $result;
    }

    public function change_bitmart_info($cancel_order_confirm, $bitmart_access_key, $bitmart_secret_key, $bitmart_memo)
    {
        $queryAddDomain = "UPDATE settings SET cancel_order_confirm = :cancel_order_confirm, bitmart_access_key=:bitmart_access_key, bitmart_secret_key = :bitmart_secret_key, bitmart_memo = :bitmart_memo WHERE id = 1";
        $stmt = $this->db->prepare($queryAddDomain);
        $stmt->bindparam(':cancel_order_confirm', $cancel_order_confirm);
        $stmt->bindparam(':bitmart_access_key', $bitmart_access_key);
        $stmt->bindparam(':bitmart_secret_key', $bitmart_secret_key);
        $stmt->bindparam(':bitmart_memo', $bitmart_memo);
       
        return $stmt->execute();;
    }

    public function get_routine_info()
    {
        $query = "SELECT * FROM penetration_setting;";
        $stmt = $this->db->prepare($query);   
        $stmt->execute();
        $result = [
            'direction' => 'buy',
            'limit_order' => 0,
            'repeat_count' => 1,
            'min_size' => 10,
            'max_size' => 20,
            'min_interval' => 10,
            'max_interval' => 180,
            'limit_price' => 5,
            'routine_run_flag' => 0,
            'next_interval' => 0
        ];
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $result = $row;
            }
        } else {
            $query = "INSERT INTO penetration_setting(direction, limit_order, repeat_count, min_size, max_size, min_interval, max_interval, next_interval, limit_price, routine_run_flag) VALUES('buy', 0, 1, 10, 20, 10, 180, 0, 5, 0);";
            $stmt = $this->db->prepare($query);   
            $stmt->execute();
        }
        return $result;
    }

    public function create_order($size, $order_type, $limit_price)
    {

    }

    public function routine()
    {
        while ($this->routine_run_flag) {
            $routine = $this->get_routine_info();
            if ((int) $routine["routine_run_flag"] == 1) {
                if (time() - $routine["last_timestamp"] >= $routine["next_interval"]) {
                    $size = rand(round((float) $routine["min_size"] * 10), round((float) $routine["max_size"] * 10)) / 10;
                    $this->create_order($size, $routine["direction"], $routine["limit_price"]);
                    
                    if ($routine["current_repeated_count"] + 1 >= $routine["repeat_count"]) {
                        $queryAddDomain = "UPDATE penetration_setting SET current_repeated_count = 0, routine_run_flag = 0, last_timestamp = " . time() . " WHERE id = 1";
                        $this->routine_run_flag = false;
                    } else {
                        $next_interval = rand($routine["min_interval"], $routine["max_interval"]);
                        $queryAddDomain = "UPDATE penetration_setting SET current_repeated_count = current_repeated_count + 1, next_interval = " . $next_interval . ", last_timestamp = " . time() . " WHERE id = 1";
                    }
                    $stmt = $this->db->prepare($queryAddDomain);       
                    $stmt->execute();
                }

            } else {
                $this->routine_run_flag = false;
            }
            sleep(1);
        }
    }

    public function stop_routine()
    {
        $this->routine_run_flag = false;
        $queryAddDomain = "UPDATE penetration_setting SET routine_run_flag = 0 WHERE id = 1";
        $stmt = $this->db->prepare($queryAddDomain);
        return $stmt->execute();
    }

    public function start_routine($direction, $limit_order, $repeat_count, $min_size, $max_size, $min_interval, $max_interval, $limit_price)
    {
        $this->routine_run_flag = true;
        $queryAddDomain = "UPDATE penetration_setting SET direction = :direction, limit_order=:limit_order, repeat_count = :repeat_count, min_size = :min_size, max_size = :max_size, min_interval = :min_interval, max_interval = :max_interval, next_interval = :next_interval, limit_price = :limit_price, routine_run_flag = 1, last_timestamp = :last_timestamp  WHERE id = 1";
        $time = time();
        $next_interval = rand($min_interval, $max_interval);;
        $stmt = $this->db->prepare($queryAddDomain);
        $stmt->bindparam(':direction', $direction);
        $stmt->bindparam(':limit_order', $limit_order);
        $stmt->bindparam(':repeat_count', $repeat_count);
        $stmt->bindparam(':min_size', $min_size);
        $stmt->bindparam(':max_size', $max_size);
        $stmt->bindparam(':min_interval', $min_interval);
        $stmt->bindparam(':max_interval', $max_interval);
        $stmt->bindparam(':next_interval', $next_interval);
        $stmt->bindparam(':limit_price', $limit_price);
        $stmt->bindparam(':last_timestamp', $time);
        $stmt->execute();
        return true;
    }
}
?>