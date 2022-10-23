fn main() {
    let n: i32 = climb_stairs(45);
    println!("Endergebnis: {}",n);
}

fn climb_stairs(n: i32) -> i32 {
    let mut max_val=(n as i128);
    let mut result: i128=0;
    let iterations=(max_val)/2;
    for s in 0..iterations+1 {
        if s<=max_val-s{
            result += fac(max_val, max_val-s)/fac(s,1);
        }else {
            result += fac(max_val,s)/fac(max_val-s,1);
        }
        max_val-=1;
    }
    return result as i32;
}

fn fac(max_val: i128, shorted: i128)-> i128{
    let mut result=1;
    for i in shorted+1..max_val+1{
        result=result*i;
    }
    return result;
}



