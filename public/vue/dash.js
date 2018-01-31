var app = new Vue({
    el: '#root',
    data: {
        companyShow:true
    },
    methods: {
        typeCheck:function (e) {
            console.log(e.target.value);
            app.companyShow = e.target.value == 'ftth';
        }
    },
    mounted: function () {
        // this.getProducts();
        // this.getCompanies();
        // this.getCart();
        // this.getCart();
    }

});





