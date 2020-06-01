<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <form v-on:submit.prevent="submit">
                    <div class="form-group row">
                        <label for="title" class="col-sm-3 col-form-label">Category</label>
                        <div class="col-sm-9 form-control">
                            <input type="radio" id="1" value="1" v-model="task.category_id">
                            <label for="category_id">趣味</label>
                            <input type="radio" id="2" value="2" v-model="task.category_id">
                            <label for="category_id">勉強</label>
                            <input type="radio" id="3" value="3" v-model="task.category_id">
                            <label for="category_id">恋愛</label>
                            <input type="radio" id="4" value="4" v-model="task.category_id">
                            <label for="category_id">仕事</label>
                        </div>
                        <span v-if="error_messages.category_id" style="color:red">{{ error_messages.category_id[0] }}</span>
                    </div>
                    <div class="form-group row">
                        <label for="title" class="col-sm-3 col-form-label">Title</label>
                        <input type="text" class="col-sm-9 form-control" id="title" v-model="task.title">
                        <span v-if="error_messages.title" style="color:red">{{ error_messages.title[0] }}</span>
                    </div>
                    <div class="form-group row">
                        <label for="content" class="col-sm-3 col-form-label">Content</label>
                        <input type="text" class="col-sm-9 form-control" id="content" v-model="task.content">
                        <span v-if="error_messages.content" style="color:red">{{ error_messages.content[0] }}</span>
                    </div>
                    <div class="form-group row">
                        <label for="person-in-charge" class="col-sm-3 col-form-label">Person In Charge</label>
                        <input type="text" class="col-sm-9 form-control" id="person-in-charge" v-model="task.person_in_charge">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                task: {},
                error_messages: {}
            }
        },
        methods: {
            submit() {
                axios.post('/api/tasks', this.task)
                    .then((res) => {
                        this.$router.push({
                            name: 'task.list'
                        });
                    })
                    .catch(error => {
                    console.log(error.response.data.errors)
                        this.error_messages = error.response.data.errors
                    });
            }
        }
    }

</script>
