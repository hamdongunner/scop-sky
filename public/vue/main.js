var app = new Vue({
    el: '#root',
    data: {search: '', products: [], cart: [], complete: [], shoppingCount: 0, companies: [], shoppingCart: [],confirmButtonShow : false
    ,price:0},
    methods: {
        getProducts: function () {
            $.ajax({
                url: '/get-cards',
                type: 'GET',
                dataType: 'json',
                success: function (results) {
                    console.log('getProducts', results);
                    app.products = results;
                    for (i = 0; i < app.products.length; i++) {
                        app.products[i].show = false;
                    }
                }
            });
            $.ajax({
                url: '/get-cart',
                type: 'GET',
                dataType: 'json',
                success: function (results) {
                    console.log('get-cart', results);
                    app.shoppingCount = results['count'];
                    app.shoppingCart = results['carts'];
                    for (var k in app.shoppingCart) {
                        console.log(k, app.shoppingCart[k]);
                        for (i = 0; i < app.products.length; i++) {
                            if (k == app.products[i].id)
                                app.products[i].show = true;
                        }
                    }
                }
            });

        },

        getCompanies: function () {
            $.ajax({
                url: '/get-companies',
                type: 'GET',
                dataType: 'json',
                success: function (results) {
                    console.log('getCompanies', results);
                    app.companies = results;
                }
            });
        },

        addToCart: function (index) {
            $.ajax({
                url: '/cart-add/' + index,
                type: 'GET',
                dataType: 'json',
                success: function (results) {
                    console.log(results);
                    app.cart = results;
                    keys = Object.keys(results);
                    length = Object.keys(results).length;
                    console.log('length is ', length);
                    app.shoppingCount = 0;
                    for (i = 0; i < length; i++) {
                        app.shoppingCount = app.shoppingCount + app.cart[keys[i]].quantity;
                    }

                }
            });
            app.products.forEach(function (t) {
                if (t.id == index)
                    t.show = true;
            })
        },
        addCompany: function (index) {
            $.ajax({
                url: '/company-add/' + index,
                type: 'GET',
                dataType: 'json',
                success: function (results) {
                    console.log('add Company', results);
                }
            });
            app.confirmButtonShow = true;
        },
        deleteFromCart: function (index) {
            $.ajax({
                url: '/cart-delete/' + index,
                type: 'GET',
                dataType: 'json',
                success: function (results) {
                    console.log('checkout is',results);
                    console.log('product',app.products);
                    app.cart = results;
                    keys = Object.keys(results);
                    length = Object.keys(results).length;
                    console.log('length is ', length);
                    app.shoppingCount = 0;
                    for (i = 0; i < length; i++) {
                        app.shoppingCount = app.shoppingCount + app.cart[keys[i]].quantity;
                    }

                    if(results[index] == null){
                    app.products.forEach(function (t) {
                        if (t.id == index)
                            t.show = false;
                    });}
                }
            });


        },
        autoComplete: function () {
            this.complete = [];
            $("#search").autocomplete({
                source: '/products/auto'
            });
        },

        sendTheValue:function () {
            Theprice = Math.ceil(app.price/50)*50;
            app.price = Theprice;
            $.ajax({
                url: '/price-add/' + Theprice,
                type: 'GET',
                dataType: 'json',
                success: function (results) {
                    console.log('price', results);
                }
            });
        }

    },
    mounted: function () {
        this.getProducts();
        this.getCompanies();
        // this.getCart();
        // this.getCart();
    }

});





