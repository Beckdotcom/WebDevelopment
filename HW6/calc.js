function calculate(p,r,n) {
    var r_monthly

    if (isNaN(p) == true || isNaN(r) == true || isNaN(n) == true ) {
        alert("Your input is invalid. Please use only numbers.");
        
        }
    else if (Math.sign(p) == -1 || Math.sign(r) == -1 || Math.sign(n) == -1 ){
        alert("Your input is invalid. Please use only positive numbers.");
        
        }
    else if (p == "" || r == "" || n == "" ){
        alert("Your input is invalid. Please complete all fields");
        
        }
    else {
        n = Math.ceil(n)
        //P = 1200.3, r=1.2/100, n=12.4 - 100.68
        //r = r/12
        //r_monthly = p * r / (1 - (1 / ( Math.pow(1 + r,n))))
        //r_monthly = p * r / (1 - (Math.pow(1/(1 + r), n)));
        r_monthly = p * r / (1 - (1 / Math.pow((1 + r),n)))
        console.log(r_monthly)
        document.getElementById("m_pay").value = r_monthly.toFixed(2)
        var sum = r_monthly * n
        document.getElementById("sum_pay").value = sum.toFixed(2)
        var total_interest = sum - p 
        document.getElementById("int_pay").value = total_interest.toFixed(2)
    }    
}
