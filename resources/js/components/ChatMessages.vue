<template>
    <div class="inbox_msg">
        <div class="inbox_people">
            <div class="headind_srch">
                <div class="recent_heading">
                    <h4>Recent</h4>
                </div>
                <div class="srch_bar">
                    <div class="stylish-input-group">
                        <input v-model="search" type="search" class="search-bar"  placeholder="Search">
                        <span class="input-group-addon">
                            <button type="button">
                                <i class="fa fa-search" aria-hidden="true"/>
                            </button>
                        </span>
                    </div>
                </div>
            </div>
            <div class="inbox_chat">
                <div v-for="(user, index) in users" v-bind:key="index" :class="[`chat_list`, {
                    'active_chat': form.user_id != null && user.id == form.to_user_id ? true: false
                }]" @click="fetchMessages(index)">
                    <div class="chat_people">
                        <div class="chat_img">
                            <img :src="user.photo" alt="avatar">
                        </div>
                        <div class="chat_ib">
                            <h5>{{ user.name }} <span class="chat_date">{{ new Date(user.message).toLocaleString() }}</span></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mesgs">
            <div class="msg_history">
                <div v-for="(message, index) in messages" v-bind:key="index">
                    <div v-if="user_id != message.user_id" class="incoming_msg">
                        <div class="incoming_msg_img">
                            <img :src="avatar" alt="avatar">
                        </div>
                        <div class="received_msg">
                            <div class="received_withd_msg">
                                <p>{{ message.content }}</p>
                                <span class="time_date">{{ new Date(message.created_at).toLocaleString() }}</span>
                            </div>
                        </div>
                    </div>
                    <div v-else class="outgoing_msg">
                        <div class="sent_msg">
                            <p>{{ message.content }}</p>
                            <span class="time_date">{{ new Date(message.created_at).toLocaleString() }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div v-if="messages.length > 0" class="type_msg">
                <div class="input_msg_write">
                    <form @submit.prevent="send">
                        <input v-model="form.content"  type="text" class="write_msg" placeholder="Type a message">
                        <button class="msg_send_btn" type="submit">
                            <i class="fa fa-paper-plane-o" aria-hidden="true"/>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { debounce, isEmpty } from 'lodash'

export default {
    name: 'chat-messages',

    props: {
        user_id: 0
    },

    data() {
        return {
            users: [],
            messages: [],
            form: {
                to_user_id: null,
                content: ''
            },
            search: '',
            avatar: ''
        }
    },

    methods: {

        fetchData() {
            axios.get('api/messages/users').then(({ data }) => {
                this.users = data
            })
        },

        fetchMessages(index) {
            this.form.user_id = this.user_id
            this.form.to_user_id = this.users[index].id
            axios.get('api/messages/' + this.users[index].id).then(({ data }) => {
                this.messages = data
                this.search = ''
            }).finally(() => {
                this.avatar = this.users[index].photo
            })
        },

        send() {
            axios.post('api/messages', this.form).finally(() => {
                this.form.to_user_id = null
                this.form.content = ''
            })
        },

        fetchUsers() {
            axios.get('api/user/' + this.search).then(({ data }) => {
                this.users = data
            })
        }

    },

    mounted() {
        this.fetchData()

        window.Echo.channel('messages')
            .listen('MessageEvent', (e) => {
                if (this.user_id == e.user_id || this.user_id == e.to_user_id) {
                    this.messages.push(e)
                }
            })
    },

    watch: {
        search: debounce( function() {
            if (isEmpty(this.search)) {
                this.fetchData()
            } else {
                this.fetchUsers()
            }
        }, 500)
    }
}
</script>
