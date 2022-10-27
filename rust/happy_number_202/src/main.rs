fn main() {
    println!("{}",is_happy(19));

}

fn get_next(n:i32) -> i32{
    let mut old= n;
    let mut new:i32 = 0;
    while old!=0{
        let tmp=old % 10;
        new += tmp*tmp;
        old = old/10;
    }
    return new;
}

fn is_happy(n: i32) -> bool {
    let mut seen: Vec<i32> = Vec::new();
    let mut next= n;
    while(next!=1){
        seen.push(next);
        next=get_next(next);
        if seen.contains(&next){
            return false;
        }
    }
    return true;
}
