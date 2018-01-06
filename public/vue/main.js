var app = new Vue({
    el: '#root',
    data: {search: '', products: [], cart: [], complete: [], shoppingCount: 0},
    methods: {
        getProducts: function () {
            $.ajax({
                url: '/get-cards',
                type: 'GET',
                dataType: 'json',
                success: function (results) {
                    console.log(results);
                    app.products = results;
                }
            });
        },
        addToCart: function (index) {
            $.ajax({
                url: '/cart/add/' + index,
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

        },
        deleteFromCart: function (index) {
            $.ajax({
                url: '/cart/delete/' + index,
                type: 'GET',
                dataType: 'json',
                success: function (results) {
                    console.log(results);
                    app.cart = results;
                }
            });

        },
        getCart: function () {
            $.ajax({
                url: '/cart',
                type: 'GET',
                dataType: 'json',
                success: function (results) {
                    console.log(results);
                    app.cart = results;
                }
            });
        },
        autoComplete: function () {
            this.complete = [];
            $("#search").autocomplete({
                source: '/products/auto'
            });
        }
    },
    mounted: function () {
        this.getProducts();
        // this.getCart();
    }
});



