import ky from 'ky'
import { useUserStore } from '@/stores'
import type { NewsRequestType } from '@/entities/news/news.model'

const BASE_URL = import.meta.env.VITE_BASE_URL

export const NewsService = () => {

    const news = async (): Promise<{ data: NewsRequestType[] }> => await ky('news', {
        prefixUrl: `${ BASE_URL }`,
        method: 'get',
        timeout: 60000,
    }).json()

    const newsById = async (id: number): Promise<{ data: NewsRequestType }> => await ky(`news/${ id }`, {
        prefixUrl: `${ BASE_URL }`,
        method: 'get',
        headers: {
            'Accept': 'application/json',
            'Authorization': `Bearer ${ useUserStore().token }`,
        },
        timeout: 60000,
    }).json()

    const createNews = async (data: NewsRequestType): Promise<{ data: NewsRequestType }> => await ky(`news`, {
        prefixUrl: `${ BASE_URL }`,
        method: 'post',
        headers: {
            'Accept': 'application/json',
            'Authorization': `Bearer ${ useUserStore().token }`,
        },
        json: data,
        timeout: 60000,
    }).json()

    const updateNews = async (data: NewsRequestType): Promise<{ data: NewsRequestType }> => await ky(`news/${ data.id }`, {
        prefixUrl: `${ BASE_URL }`,
        method: 'put',
        json: data,
        headers: {
            'Accept': 'application/json',
            'Authorization': `Bearer ${ useUserStore().token }`,
        },
        timeout: 60000,
    }).json()

    const newsDelete = async (id: number): Promise<number | null> => await ky(`news/${ id }`, {
        prefixUrl: `${ BASE_URL }`,
        method: 'delete',
        timeout: 60000,
    }).json()

    return {
        news,
        newsById,
        newsDelete,
        createNews,
        updateNews,
    }
}
