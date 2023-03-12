<template>
    <main class="overflow-hidden ">
        <!--Start Breadcrumb Style2-->
        <section class="breadcrumb-area" style="background-image: url(assets/images/inner-pages/breadcum-bg.png);">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="breadcrumb-content text-center wow fadeInUp animated">
                            <h2>Cart</h2>
                            <div class="breadcrumb-menu">
                                <ul>
                                    <li><a href="index.html"><i class="flaticon-home pe-2"></i>Home</a></li>
                                    <li> <i class="flaticon-next"></i> </li>
                                    <li class="active">Cart</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End Breadcrumb Style2-->
        <!--Start cart area-->
        <section class="cart-area pt-120 pb-120">
            <div class="container">
                <div class="row wow fadeInUp animated">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="cart-table-box">
                            <div class="table-outer">
                                <table class="cart-table">
                                    <thead class="cart-header">
                                    <tr>
                                        <th class="">Product Name</th>
                                        <th class="price">Price</th>
                                        <th>Quantity</th>
                                        <th>Subtotal</th>
                                        <th class="hide-me"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="(product, index) in products" >
                                        <td>
                                            <div class="thumb-box"> <a href="shop-details-1.html" class="thumb">
                                                <img src="assets/images/shop/cart-product-thumb-1.jpg" alt="">
                                            </a> <a href="shop-details-1.html" class="title">
                                                <h5> {{ product.title }} </h5>
                                            </a> </div>
                                        </td>
                                        <td>${{ product.price }}</td>
                                        <td class="qty">
                                            <div class="qtySelector text-center">
                        <span class="decreaseQty">
                          <i class="flaticon-minus" @click.prevent="minusQty(product)"></i>
                        </span>
                                                <input type="number" class="qtyValue" :value="product.qty" />
                                                <span class="increaseQty">
                          <i class="flaticon-plus" @click.prevent="plusQty(product)"></i>
                        </span>
                                            </div>
                                        </td>
                                        <td class="sub-total">${{ product.price*product.qty }}</td>
                                        <td>
                                            <div class="remove"> <i class="flaticon-cross" @click.prevent="removeProduct(index)"></i> </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="cart-button-box">
                            <div class="apply-coupon wow fadeInUp animated">
                                <div class="apply-coupon-input-box mt-30 "> <input type="text" name="coupon-code"
                                                                                   value="" placeholder="Coupon Code"> </div>
                                <div class="apply-coupon-button mt-30"> <button class="btn--primary style2"
                                                                                type="submit">Apply Coupon</button> </div>
                            </div>
                            <div class="cart-button-box-right wow fadeInUp animated"> <button class="btn--primary mt-30"
                                                                                              type="submit">Continue Shopping</button> <button class="btn--primary mt-30"
                                                                                                                                               type="submit">Update Cart</button> </div>
                        </div>
                    </div>
                </div>

                <div class="row pt-120">
                    <div class="col-xl-6 col-lg-7 wow fadeInUp animated">
                        <div class="cart-total-box">
                            <div class="inner-title">
                                <h3>Cart Totals</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt--30">
                    <div class="col-xl-6 col-lg-7 wow fadeInUp animated">
                        <div class="cart-total-box mt-30">
                            <div class="form-group p-2">
                                <label for="name">Name</label>
                                <input v-model="name" type="email" class="form-control" id="name"  placeholder="Enter name" >
                            </div>
                            <div class="form-group p-2">
                                <label for="email">Email address</label>
                                <input v-model="email" type="email" class="form-control" id="email" placeholder="Enter email">
                            </div>
                            <div class="form-group p-2">
                                <label for="address">Address</label>
                                <input v-model="address" type="email" class="form-control" id="address" aria-describedby="emailHelp" placeholder="Enter address">
                            </div>
                            <button @click.prevent="storeOrder" type="submit" class="btn btn-primary p-2">Order</button>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-5 wow fadeInUp animated">
                        <div class="cart-check-out mt-30">
                            <h3>Check Out</h3>
                            <ul class="cart-check-out-list">

                                <li>
                                    <div class="left">
                                        <p>Total Price:</p>
                                    </div>
                                    <div class="right">
                                        <p>${{ totalPrice }}</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End cart area-->
    </main>
</template>

<script>
export default {
    name: "Index.vue",
    mounted() {
        $(document).trigger('changed')
        this.getCartProducts()
    },

    data() {
        return {
            products: [],
            name: '',
            email: '',
            address: '',
        }
    },

    computed: {
        totalPrice(){
            let total = 0;
            this.products.forEach(product => {
                total += product.price * product.qty
            })

            return total;
        }
    },

    methods: {

        storeOrder(){
            this.axios.post('http://localhost:8876/api/orders',{
                'products': this.products,
                'name': this.name,
                'email': this.email,
                'address': this.address,
                'total_price': this.totalPrice
            })
                .then(res => {
                    //this.products = res.data.data;
                    console.log(res);
                })
                .finally(v => {
                    $(document).trigger('changed')
                })
        },

        getCartProducts(){
            this.products = JSON.parse(localStorage.getItem('cart'))
            console.log(this.products);
        },

        minusQty(product) {

            if(product.qty === 0) return
            product.qty--
            console.log(product.qty);
        },
        plusQty(product) {
            product.qty++
            console.log(product);
        },

        removeProduct(index){
            if(confirm("Do you really want to delete?")) {
                this.products.splice(index, 1);
                localStorage.setItem('cart', JSON.stringify(this.products))
            }
        },
    }

}
</script>

<style scoped>

</style>
