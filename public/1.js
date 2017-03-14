function formula (cell, form) {
    if(form.period > 0){
        if(form.limit > cell.recomended){
            var prcnt = 200;
            if(cell.currency == "dollar"){prcnt = 30;} else if(cell.currency == "euro"){prcnt = 300;}
            return {"value": (form.limit / prcnt * 12 * (Math.floor(form.period * 100) / 100)),
                "unit":[" миля"," мили"," миль"]}
        }}
    return null }
formula(cell, form)