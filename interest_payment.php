<?php
  function totalInterestPayment($principal, $apr, $term, $draws, $first_disbursement) {

    $monthly_interest_rate = $apr / $term / 100;

    $payments = array();

    for ($draw = 0; $draw <= $draws; $draw++) {
        if ($draw === 0) {
            $remaining_funds = $principal - $first_disbursement;

            $first_month_payment = $monthly_interest_rate * $first_disbursement;

            $payments[] = $first_month_payment;

            echo "your first disbursement is $".$first_disbursement. "<br>";
            echo "your first month payment is $".(int)$first_month_payment. "<br>";
            echo "your remaining funds is $".$remaining_funds. "<br><br>";
        } else {
            $disbursed_funds = $first_disbursement + $remaining_funds * ($draw / $draws);

            $new_monthly_payment = $monthly_interest_rate * $disbursed_funds;

            $payments[] = $new_monthly_payment;

            echo "after ".$draw." draw, your total amount disbursed is $".(int)$disbursed_funds. "<br>";
            echo "and your payment this month is $".(int)$new_monthly_payment. "<br><br>";
        }
    }

    echo "Total payment is $" .(int)array_sum($payments);
  }
  totalInterestPayment(561000, 12.99, 12, 6, 117000);
