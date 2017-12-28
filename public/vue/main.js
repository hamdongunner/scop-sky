var app = new Vue({
    el: '#root',
    data: {search: '', products: [], cart: [], complete: []},
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
