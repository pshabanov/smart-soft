import {api} from '@/utils'
import type {UserInfoType} from '@/entities/user/user.model'
import ky from "ky";
import {useUserStore} from "@/stores";
import type {BannersRequestType} from "@/entities/news/news.model";

const BASE_URL = import.meta.env.VITE_BASE_URL

export const NewsService = () => {

    const news = async ():Promise<{data: BannersRequestType[]}> => await ky('news', {
        prefixUrl: `${BASE_URL}`,
        method: 'get',
        timeout: 60000,
    }).json()

    const newsById = async (id:number) => await ky(`news/${id}`, {
        prefixUrl: `${BASE_URL}`,
        method: 'post',
        headers: {
            "Accept": "application/json",
            'Authorization': `Bearer ${useUserStore().token}`
        },
        timeout: 60000,
    }).json();

    const getUsers = () => api<UserInfoType[]>({
        url: 'users/read',
    })

    return {
        news,
        newsById
    }
}
