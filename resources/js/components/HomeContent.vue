<template>
    <div>
        <form>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="productName" placeholder="eggs...">
                <label for="productName">Please type product name</label>
            </div>
            <button type="button" @click="() => alert('ui')" class="btn btn-primary">Search</button>
        </form>
        <table class="table table-bordered table-responsive mt-3">
            <tr>
                <th>Shop Name</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Address</th>
                <th>Quantity</th>
                <th>Action</th>
            </tr>
            <tr>
                <td>Baba G Wholesalers</td>
                <td>Eggs</td>
                <td>$20</td>
                <td>Norfolky, Virginia</td>
                <td>1 Dozens</td>
                <td>
                    <div class="btn-group">
                        <a href="" class="btn btn-primary">Add Lists</a>
                        <a href="" class="btn btn-success">Add Favourites</a>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Coles World Square</td>
                <td>Eggs</td>
                <td>$25</td>
                <td>Jersey, Virginia</td>
                <td>1 Dozens</td>
                <td>
                    <div class="btn-group">
                        <a href="" class="btn btn-primary">Add Lists</a>
                        <a href="" class="btn btn-success">Add Favourites</a>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Romeo's IGA Food Hall</td>
                <td>Eggs</td>
                <td>$23</td>
                <td>Norfolky, Virginia</td>
                <td>1 Dozens</td>
                <td>
                    <div class="btn-group">
                        <a href="" class="btn btn-primary">Add Lists</a>
                        <a href="" class="btn btn-success">Add Favourites</a>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Coles Wynyard Express</td>
                <td>Eggs</td>
                <td>$27</td>
                <td>Jersey, Virginia</td>
                <td>1 Dozens</td>
                <td>
                    <div class="btn-group">
                        <a href="" class="btn btn-primary">Add Lists</a>
                        <a href="" class="btn btn-success">Add Favourites</a>
                    </div>
                </td>
            </tr>
            <tr>
                <td>Woolworths Town Hall</td>
                <td>Eggs</td>
                <td>$18</td>
                <td>Norfolky, Virginia</td>
                <td>1 Dozens</td>
                <td>
                    <div class="btn-group">
                        <a href="" class="btn btn-primary">Add Lists</a>
                        <a href="" class="btn btn-success">Add Favourites</a>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</template>

<script>
import {reactive, toRefs} from "vue";

export default {
    name: 'HomeContent',
    props: {},
    setup(props, {emit}) {

        const state = reactive({
            searchKeyword: null
        });

        return {
            ...toRefs(state)
        };
    }
}
</script>

<style scoped>

</style>
