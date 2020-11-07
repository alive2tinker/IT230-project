<template>
<div>
    <div class="list-group">
        <div v-if="isLoading" class="list-group-item list-group-item-action d-flex justify-content-center">
            <span class="fas fa-spinner fa-5x"></span>
        </div>
        <div v-else-if="comments.length > 0" v-for="comment in comments" class="list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">{{comment.user.name}}</h5>
                <small>{{comment.createdAt}}</small>
            </div>
            <p class="mb-1">
                {{comment.contents}}
            </p>
        </div>
        <div v-else class="list-group-item list-group-item-action">
            <h4 class="text-center">No Comments</h4>
        </div>
    </div>
    <div class="card my-3" v-if="user">
        <div class="card-body">
            <textarea class="form-control" rows="4" v-model="commentContent"></textarea>
        </div>
        <div class="card-footer">
            <button type="button" @click="submitComment" class="btn btn-primary" :disabled="pushingNewComment">
                <span class="fas fa-spinner" v-if="pushingNewComment"></span>
                <span v-else>Submit</span>
            </button>
        </div>
    </div>
    <div class="card my-3" v-else>
        <div class="card-body">
            <h4 class="text-center">Need to Sign in to comment</h4>
        </div>
    </div>
</div>
</template>

<script>
export default {
    name: "Comments",
    props: ["post", "user"],
    data() {
        return {
            comments: [],
            commentContent: "",
            isLoading: true,
            pushingNewComment: false
        };
    },
    mounted() {
        this.syncData();
    },
    methods: {
        syncData: function () {
            axios.get(`/posts/${this.post}/comments`).then((response) => {
                this.comments = response.data.data;
                this.isLoading = false;
            });
        },
        submitComment: function () {
            this.pushingNewComment = true;
            var fd = new FormData();
            fd.append('contents', this.commentContent);
            axios.post(`/posts/${this.post}/comments`, fd).then((response) => {
                this.comments.push(response.data);
                this.pushingNewComment = false;
                this.commentContent = '';
            }).catch((error) => {
                console.log(error);
            });
        }
    }
};
</script>

<style scoped>
span.fa-spinner {
    animation-name: spin;
    animation-duration: 1000ms;
    animation-iteration-count: infinite;
    animation-timing-function: linear;
}

@keyframes spin {
    from {
        transform: rotate(0deg);
    }

    to {
        transform: rotate(360deg);
    }
}
</style>
