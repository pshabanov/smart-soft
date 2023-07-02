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

    const createNews = async (data: NewsRequestType, files: Blob[]): Promise<NewsRequestType> => {
        const formData = new FormData()
        formData.append('title', data.title)
        formData.append('description', data.description)
        formData.append('active', String(data.active))
        if (files.length){
            formData.append('files', files[0])
        }
        return await ky(`news`, {
            prefixUrl: `${ BASE_URL }`,
            method: 'post',
            headers: {
                'Authorization': `Bearer ${ useUserStore().token }`,
            },
            body: formData,
            timeout: 60000,
        }).json()
    }

    const updateNews = async (data: NewsRequestType): Promise<{data: NewsRequestType}> => {

        return await ky(`news/${ data.id }`, {
            prefixUrl: `${ BASE_URL }`,
            method: 'put',
            headers: {
                'Authorization': `Bearer ${ useUserStore().token }`,
            },
            json: data,
            timeout: 60000,
        }).json()
    }

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
