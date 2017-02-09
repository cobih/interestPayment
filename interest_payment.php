<?php

function totalInterestPayment($principal, $apr, $term, $draws, $first_disbursement) {
  $totalMonths = $term;
  
  $monthlyInterestRate = $apr / $totalMonths / 100;
  
  $Payments = array();
  
  for ($draw = 0; $draw <= $draws; $draw++) {
      if ($draw === 0) {
          $remaining_funds = $principal - $first_disbursement;
          
          $firstMonthPayment = $monthlyInterestRate * $first_disbursement;
          
          array_push($Payments, $firstMonthPayment);
          
          echo "your first disbursment is $".$first_disbursement. "<br>";
          echo "your first month payment is $".$firstMonthPayment. "<br>";
          echo "your remaining funds is $".$remaining_funds. "<br>";
      } else {
          $disbursed_funds = $first_disbursement + $remaining_funds * ($draw / $draws);
          
          $newMonthlyPayment = $monthlyInterestRate * $disbursed_funds;
          
          array_push($Payments, $newMonthlyPayment);
         
          echo "your total amount disbursed is $".$disbursed_funds. "<br>";
          echo "and your payment this month is $".$newMonthlyPayment. "<br>";
      }
  }
          
  echo "Total payment is $" .array_sum($Payments);
}

totalInterestPayment(561000, 12.99, 12, 6, 118000);
