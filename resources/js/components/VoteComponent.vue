<template>
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-lg-8">
                <h2 class="text-white mb-4 custom-text">ГОЛОСУЙ!</h2>
                <div style="display: flex; justify-content: center">
                    <button @click.prevent="sendvote('igor')" class="pushable" style="margin-right: 50px;">
                        <span class="shadow"></span>
                        <span class="edge"></span>
                        <span class="front"> IGOR </span>
                    </button>
                    <button @click.prevent="sendvote('sidjey')" class="pushable">
                        <span class="shadow"></span>
                        <span class="edge"></span>
                        <span class="front"> SIDJEY </span>
                    </button>
                </div>
            </div>
        </div>
        <table class="table" style="--bs-table-color: white; margin-top:25px;">
            <thead>
            <tr>
                <th scope="col">IGOR</th>
                <th scope="col">SIDJEY</th>
            </tr>
            </thead>
            <tbody class="table-group-divider">
            <tr>
                <td>{{ igor }}</td>
                <td>{{ sidjey }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    name: "VoteComponent",
    data() {
        return {
            igor: 0,
            sidjey: 0,
        }
    },
    methods: {
        async getvote() {
            try {
                const res = await axios.get('/api/getvote');
                this.igor = res.data.igor;
                this.sidjey = res.data.sidjey;
            } catch (error) {
                console.error("Error fetching votes:", error);
            }
        },

        async sendvote(voteOption) {
            try {
                await axios.post('/api/vote', {vote: voteOption});
                await this.getvote();
            } catch (error) {
                console.error("Error voting:", error);
            }
        }
    },
    mounted() {
        this.getvote();
    }
}
</script>

<style>
/* Ваші стилі */
</style>
