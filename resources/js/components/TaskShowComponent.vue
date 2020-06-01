<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-6">
                <form>
                    <div class="form-group row border-bottom">
                        <label for="id" class="col-sm-3 col-form-label">ID</label>
                        <input type="text" class="col-sm-9 form-control-plaintext" readonly id="id"
                            v-model="task.id">
                    </div>
                    <div class="form-group row border-bottom">
                        <label for="category_id" class="col-sm-3 col-form-label">category</label>
                        <input type="text" class="col-sm-9 form-control-plaintext" readonly id="category_id"
                            v-model="category_label[task.category_id]">
                    </div>
                    <div class="form-group row border-bottom">
                        <label for="title" class="col-sm-3 col-form-label">Title</label>
                        <input type="text" class="col-sm-9 form-control-plaintext" readonly id="title"
                            v-model="task.title">
                    </div>
                    <div class="form-group row border-bottom">
                        <label for="content" class="col-sm-3 col-form-label">Content</label>
                        <input type="text" class="col-sm-9 form-control-plaintext" readonly id="content"
                            v-model="task.content">
                    </div>
                    <div class="form-group row border-bottom">
                        <label for="person-in-charge" class="col-sm-3 col-form-label">Person In Charge</label>
                        <input type="text" class="col-sm-9 form-control-plaintext" readonly id="person-in-charge"
                            v-model="task.person_in_charge">
                    </div>
                    <div class="form-group row border-bottom">
                        <label for="person-in-charge" class="col-sm-3 col-form-label">updated_time</label>
                        <input type="text" class="col-sm-9 form-control-plaintext" readonly id="person-in-charge"
                            v-model="task.updated_at">
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        props: {
            taskId: String
        },
        data: function () {
            return {
                task: []
            }
        },
        methods: {
            getTaskById() {
                console.log(this.taskId);
                axios.get('/api/tasks/' + this.taskId)
                    .then((res) => {
                        console.log(res.data);
                        this.task = res.data[0];
                        this.category_label = res.data[1];
                    });
            }
        },
        mounted() {
            this.getTaskById();
        }
    }

</script>
