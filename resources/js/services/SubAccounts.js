import axios from "axios";

export class SubAccounts {
    static serverUrl = import.meta.env.VITE_BASE_URL;

    static getSubAccounts() {
        let url = `${this.serverUrl}/trade`;
        return axios.get(url);
    }
    static getExchanges() {
        let url = `${this.serverUrl}/trade/exchange`;
        return axios.get(url);
    }
}
