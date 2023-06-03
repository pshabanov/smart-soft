import type { Options } from 'ky'
import type { HttpMethod } from 'ky/distribution/types/options'

export enum StatusCode {
    SUCCESS = 'SUCCESS',
    EXCEPTION = 'EXCEPTION',
    WARNING = 'WARNING',
}

export enum HttpStatusAccidence {
    AUTHORIZED = 401,
    BAD_REQUEST = 500,
    FAILED_DATA = 422,
    NOT_FOUND = 404,
    FORBIDDEN = 403,
    BAD_METHOD = 501
}

export interface PaginationType {
    page: number,
    itemsPerPage: number,
    pageCount: number,
}


export interface FetchOptions extends Options {
    url: string
    method?: HttpMethod
    json?: unknown
}

export interface Response<T> {
    readonly data: T
    readonly resultCode: StatusCode
    readonly error: unknown
    readonly message: string
}

export interface ResponseDengi<T> {
    readonly details: T
    readonly resultCode: StatusCode
    readonly message: string
}

export interface Pagination<T> {
    current_page: number
    data: T
    first_page_url: string
    from: number
    last_page: number
    last_page_url: string
    links: unknown
    next_page_url: string
    path: string
    per_page: number
    prev_page_url: string
    to: number
    total: number
}
