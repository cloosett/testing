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
        <div v-if="message" :class="['message', messageType]">
            {{ message }}
        </div>
    </div>
</template>

<script>
export default {
    name: "VoteComponent",
    data() {
        return {
            igor: 0,
            sidjey: 0,
            message: '',  // Для зберігання повідомлення
            messageType: '',
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
                // Виконуємо POST-запит для голосування
                const response = await axios.post('/api/vote', { vote: voteOption });

                // Якщо голосування пройшло успішно
                if (response.data === 'success') {
                    if (voteOption === 'igor') {
                        this.igor++; // Збільшуємо лічильник голосів для Ігора
                    } else if (voteOption === 'sidjey') {
                        this.sidjey++; // Збільшуємо лічильник голосів для Сіджея
                    }

                    this.message = 'Ваш голос успішно враховано!'; // Повідомлення про успіх
                    this.messageType = 'success'; // Тип повідомлення - успіх
                }
            } catch (error) {
                // Якщо сталася помилка (наприклад, голосування з цієї IP вже є)
                if (error.response && error.response.data === 'Ви вже проголосували за цього кандидата!') {
                    this.message = 'Ви вже проголосували за цього кандидата!'; // Повідомлення про помилку
                    this.messageType = 'error'; // Тип повідомлення - помилка
                } else {
                    console.error("Error voting:", error);
                }
            }
        }


    },
    mounted() {
        this.getvote();
    }
}
</script>

<style>
.message {
    padding: 10px;
    margin-top: 10px;
    border-radius: 5px;
    font-size: 14px;
}

.message.success {
    background-color: #28a745;
    color: white;
}

.message.error {
    background-color: #dc3545;
    color: white;
}
</style>
