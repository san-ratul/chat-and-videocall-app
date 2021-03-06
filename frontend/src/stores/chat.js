import {defineStore} from "pinia";
import axios         from "../axios";
import isEmpty       from "../is_empty";

const UseChatStore = defineStore({
    id: 'chat',
    state: () => ({
        userList: [],
        selectedUser: {},
        messages: [],
        message: '',
        sendMessageError: '',
    }),
    getters: {
        getUserList: (state) => state.userList,
    },
    actions: {
        async setUserList() {
            if (isEmpty(this.userList)) {
                await axios.get("/users").then(async response => {
                    this.userList = response.data;
                    await this.setSelectedUser(this.userList[0])
                });
            } else {
                await this.setSelectedUser(this.userList[0])
            }
        },
        async getSelectedUserMessages($userId) {
            await axios.get(`/messages/${$userId}`)
                .then(response => {
                    this.messages = response.data;
                })
                .catch(error => {
                    console.log(error);
                });
        },
        async setSelectedUser(user) {
            this.messages     = [];
            this.selectedUser = user;
            await this.getSelectedUserMessages(user.id);
        },
        async sendMessage() {
            await axios.post(`/messages/${this.selectedUser.id}`, {message: this.message})
                .then(response => {
                    this.messages.push(response.data);
                    this.message = '';
                })
                .catch(error => {
                    this.sendMessageError = error.response.data.errors.message;
                });
        }
    }
})

export default UseChatStore;