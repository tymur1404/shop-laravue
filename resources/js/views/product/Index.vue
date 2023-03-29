<template>
    <main class="overflow-hidden ">
        <!--Start Breadcrumb Style2-->
        <div class="breadcrumb-area" style="background-image: url(/src/assets/images/inner-pages/breadcum-bg.png);">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="breadcrumb-content pb-60 text-center wow fadeInUp animated">
                            <h2>Shop Grid</h2>
                            <div class="breadcrumb-menu">
                                <ul>
                                    <li><a href="index.html"><i class="flaticon-home pe-2"></i>Home</a></li>
                                    <li><i class="flaticon-next"></i></li>
                                    <li class="active">Shop Grid</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--End Product Categories One-->
        <!--Start product-grid-->
        <div class="product-grid pt-60 pb-120">
            <div class="container">
                <div class="row gx-4">
                    <div class="col-xl-3 col-lg-4">
                        <div class="shop-grid-sidebar">
                            <button class="remove-sidebar d-lg-none d-block"><i
                                class="flaticon-cross"> </i></button>
                            <div class="sidebar-holder">

                                <div class="single-sidebar-box mt-30 wow fadeInUp animated ">
                                    <h4>Select Categories</h4>
                                    <div class="checkbox-item">
                                        <form>
                                            <div v-for="category in filterList.categories" class="form-group">
                                                <input :value="category.id"
                                                       v-model="categories"
                                                       type="checkbox"
                                                       :id="category.id">
                                                <label :for="category.id">{{ category.title }}</label>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="single-sidebar-box mt-30 wow fadeInUp animated">
                                    <h4>Color Option </h4>
                                    <ul class="color-option">
                                        <li v-for="color in filterList.colors">
                                            <a @click.prevent="addColor(color.id)"
                                               href="#0"
                                               class="color-option-single"
                                               :style="`background: ${color.title};`"> </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="single-sidebar-box mt-30 wow fadeInUp animated">
                                    <h4>Filter By Price</h4>
                                    <div class="slider-box">
                                        <div id="price-range" class="slider"></div>
                                        <div class="output-price">
                                            <label for="priceRange">Price:</label>
                                            <input type="text" id="priceRange" readonly>
                                        </div>
                                        <button @click.prevent="filterProducts" class="filterbtn" type="submit"> Filter</button>
                                    </div>
                                </div>
                                <div class="single-sidebar-box mt-30 wow fadeInUp animated pb-0 border-bottom-0 ">
                                    <h4>Tags </h4>
                                    <ul class="popular-tag">
                                        <li  v-for="tag in filterList.tags">
                                            <a @click.prevent="addTag(tag.id)" href="#0">{{ tag.title }}</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-8">
                        <div class="row">
                            <div class="col-xl-12">
                                <div
                                    class="shop-grid-page-top-info p-0 justify-content-md-between justify-content-center">
                                    <div class="left-box wow fadeInUp animated">
                                        <p>Showing 1–12 of 50 Results</p>
                                    </div>
                                    <div
                                        class="right-box justify-content-md-between justify-content-center wow fadeInUp animated">

                                        <div class="product-view-style d-flex justify-content-md-between justify-content-center">
                                            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link active" id="pills-grid-tab"
                                                            data-bs-toggle="pill" data-bs-target="#pills-grid" type="button"
                                                            role="tab" aria-selected="true">
                                                        <i class="flaticon-grid"></i>
                                                    </button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="pills-list-tab" data-bs-toggle="pill"
                                                            data-bs-target="#pills-list" type="button" role="tab"
                                                            aria-selected="false">
                                                        <i class="flaticon-list"></i>
                                                    </button>
                                                </li>
                                            </ul>
                                            <button class="slidebarfilter d-lg-none d-flex"><i class="flaticon-edit"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-grid" role="tabpanel"
                                         aria-labelledby="pills-grid-tab">
                                        <div class="row">
                                            <div v-for="product in products" class="col-xl-4 col-lg-6 col-6 ">
                                                <div class="products-three-single w-100  mt-30">
                                                    <div class="products-three-single-img"><a
                                                        href="shop-details-3.html" class="d-block"> <img
                                                        :src="product.image_url"
                                                        class="first-img" alt=""/> <img
                                                        src="/src/assets/images/home-three/productss2-hover-1.png"
                                                        alt="" class="hover-img"/>
                                                    </a>
                                                        <div class="products-grid-one__badge-box"> <span
                                                            class="bg_base badge new "> New </span>
                                                        </div>
                                                        <a href="cart.html"
                                                           class="addcart btn--primary style2"
                                                           @click.prevent="addToCart(product)">
                                                            Add To Cart </a>

                                                    </div>
                                                    <div class="color-varient">
                                                        <a v-for="color in product.colors"
                                                           href="#0"
                                                           class="color-name"
                                                           :style="`background: ${color.title};`"></a>
                                                    </div>
                                                    <div class="products-three-single-content text-center">

                                                        <span> {{ product.category.title }} </span>
                                                        <h5><router-link :to="{name: 'products.show', params: {id:product.id}}"> {{ product.title }} </router-link>
                                                        </h5>
                                                        <p> {{ product.price }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 d-flex justify-content-center wow fadeInUp animated">
                                <ul class="pagination text-center">
                                    <li v-if="pagination.current_page > 1"
                                        class="next">
                                        <a href="#0"
                                           @click.prevent="getProducts( pagination.current_page - 1)">
                                            <i class="flaticon-left-arrows"
                                               aria-hidden="true"></i>
                                        </a>
                                    </li>

                                    <li v-for="link in pagination.links">
                                        <template v-if="Number(link.label) &&
                              (pagination.current_page - link.label < 2 &&
                              pagination.current_page - link.label > -2) ||
                              Number(link.label === 1) ||
                              Number(link.label) === pagination.last_page">

                                            <a @click.prevent="getProducts(link.label)"
                                               :class="link.active ? `active` : ``"
                                               href="#0" >{{link.label}}</a>

                                        </template>
                                        <template v-if="(Number(link.label) &&
                              pagination.current_page !== 3 &&
                              pagination.current_page - link.label === 2) ||
                              (Number(link.label) &&
                              pagination.current_page !== pagination.last_page - 2 &&
                              pagination.current_page - link.label === -2)">
                                            <a>...</a>
                                        </template>
                                    </li>

                                    <li v-if="pagination.current_page !== pagination.last_page"
                                        class="next">
                                        <a href="#0"
                                           @click.prevent="getProducts( pagination.current_page + 1)">
                                            <i class="flaticon-next-1"
                                               aria-hidden="true"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End product-grid-->
    </main>
</template>

<script>
export default {
    name: "Index.vue",
    mounted() {
        $(document).trigger('changed')
        this.getProducts()
        this.getFilterList()
    },

    data() {
        return {
            products: [],
            filterList: [],
            categories: [],
            colors: [],
            tags: [],
            prices: [],
            pagination: [],
        }
    },

    methods: {

        addToCart(product){
            let id = product.id
            let cart = localStorage.getItem('cart')
            let newProduct = [
                {
                    'id': product.id,
                    'price': product.price,
                    'title': product.title,
                    'qty': 1
                }
            ];
            if (!cart) {
                localStorage.setItem('cart', JSON.stringify(newProduct))
            } else {
                cart = JSON.parse(cart)
                cart.forEach(productInCart => {
                    if(productInCart.id === id)
                    {
                        productInCart.qty = Number(productInCart.qty) + 1;
                        newProduct = null;
                    }
                });
                Array.prototype.push.apply(cart, newProduct)
                localStorage.setItem('cart', JSON.stringify(cart))
            }
        },

        filterProducts() {
            let price = $("#priceRange").val();

            this.prices = price.replace(/[\s*]|[$]/g, '').split('-')

            this.getProducts()
        },

        addColor(id) {
            if (!this.colors.includes(id)) {
                this.colors.push(id)
            } else {
                this.colors = this.colors.filter( elem => {
                    return elem !== id
                })
            }
        },

        addTag(id) {
            if (!this.tags.includes(id)) {
                this.tags.push(id)
            } else {
                this.tags = this.tags.filter( elem => {
                    return elem !== id
                })
            }
        },

        getProducts(page = 1) {
            this.axios.post('/api/products',{
                'categories': this.categories,
                'colors': this.colors,
                'tags': this.tags,
                'prices': this.prices,
                'page': page
            })
                .then(res => {
                    this.products = res.data.data;
                    this.pagination = res.data.meta;
                })
                .finally(v => {
                    $(document).trigger('changed')
                })
        },
        getFilterList() {
            this.axios.get('/api/products/filters')
                .then(res => {
                    this.filterList = res.data

                    //  Price Filter
                    if ($("#price-range").length) {
                        $("#price-range").slider({
                            range: true,
                            min: parseInt(this.filterList.price.min),
                            max: parseInt(this.filterList.price.max),
                            values: [parseInt(this.filterList.price.min), parseInt(this.filterList.price.max)],
                            slide: function (event, ui) {
                                $("#priceRange").val("$" + ui.values[0] + " - $" + ui.values[1]);
                            }
                        });
                        $("#priceRange").val("$" + $("#price-range").slider("values", 0) + " - $" + $("#price-range").slider("values", 1));
                    }
                })
                .finally(v => {
                    $(document).trigger('changed')
                })
        }
    }

}
</script>

<style scoped>

</style>
