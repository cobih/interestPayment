<?php

function totalInterestPayment($principal, $apr, $term, $draws, $first_disbursement) {
  $total_months = $term;
  
  $monthly_interest_rate = $apr / $total_months / 100;
  
  $payments = array();
  
  for ($draw = 0; $draw <= $draws; $draw++) {
      if ($draw === 0) {
          $remaining_funds = $principal - $first_disbursement;
          
          $first_month_payment = $monthly_interest_rate * $first_disbursement;
          
          array_push($payments, $first_month_payment);
          
          echo "your first disbursment is $".$first_disbursement. "<br>";
          echo "your first month payment is $".$first_month_payment. "<br>";
          echo "your remaining funds is $".$remaining_funds. "<br>";
      } else {
          $disbursed_funds = $first_disbursement + $remaining_funds * ($draw / $draws);
          
          $new_monthly_payment = $monthly_interest_rate * $disbursed_funds;
          
          array_push($Payments, $new_monthly_payment);
         
          echo "your total amount disbursed is $".$disbursed_funds. "<br>";
          echo "and your payment this month is $".$new_monthly_payment. "<br>";
      }
  }
          
  echo "Total payment is $" .array_sum($Payments);
}

totalInterestPayment(561000, 12.99, 12, 6, 118000);
